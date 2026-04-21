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
                                            <a class="nav-link" id="legalitas-usaha-tab-justified" data-bs-toggle="tab"
                                                href="#legalitas-usaha" role="tab" aria-controls="legalitas-usaha"
                                                aria-selected="false">Legalitas
                                                Usaha</a>
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
                                        <div class="tab-pane active show" id="proposal"
                                            role="tabpanel" aria-labelledby="home-tab-justified">
                                            <!-- Invoice -->
                                            <div class="col-xl-12 col-md-8 col-12">
                                                <div class="invoice-preview-card">


                                                    <hr class="invoice-spacing" />

                                                    <!-- Address and Contact starts -->
                                                    <div class="card-body invoice-padding pt-0">
                                                        <div class="row invoice-spacing">
                                                            <div class="col-xl-8 p-0">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Tanggal Pengajuan</td>
                                                                            <td>: <?php echo e($pembiayaan->tgl_pembiayaan); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Penggunaan</td>
                                                                            <td>: <?php echo e($pembiayaan->penggunaan_id); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Sektor</td>
                                                                            <td value="<?php echo e($pembiayaan->sektor->id); ?>">
                                                                                :
                                                                                <?php echo e($pembiayaan->sektor->nama_sektor_ekonomi); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Akad</td>
                                                                            <td value="<?php echo e($pembiayaan->akad->id); ?>">:
                                                                                <?php echo e($pembiayaan->akad->nama_akad); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Nama Nasabah</td>
                                                                            <td><span class="fw-bold">:
                                                                                    <?php echo e($pembiayaan->nasabahh->nama_nasabah); ?></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">No Tlp</td>
                                                                            <td>: <?php echo e($pembiayaan->nasabahh->no_tlp); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Alamat</td>
                                                                            <td>: <?php echo e($pembiayaan->nasabahh->alamat); ?>,
                                                                                <?php echo e($pembiayaan->nasabahh->rt); ?>,
                                                                                <?php echo e($pembiayaan->nasabahh->rw); ?>,
                                                                                <?php echo e($pembiayaan->nasabahh->desa_kelurahan); ?>,
                                                                                <?php echo e($pembiayaan->nasabahh->kecamatan); ?>,
                                                                                <?php echo e($pembiayaan->nasabahh->kabkota); ?>,
                                                                                <?php echo e($pembiayaan->nasabahh->provinsi); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">No KTP</td>
                                                                            <td>: <?php echo e($pembiayaan->nasabahh->no_ktp); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Tempat/Tgl Lahir</td>
                                                                            <td>:
                                                                                <?php echo e($pembiayaan->nasabahh->tmp_lahir); ?>

                                                                                /
                                                                                <?php echo e($pembiayaan->nasabahh->tgl_lahir); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Nama Ibu Kandung</td>
                                                                            <td>:
                                                                                <?php echo e($pembiayaan->nasabahh->nama_ibu); ?>

                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Jenis Usaha</td>
                                                                            <td
                                                                                value="<?php echo e($pembiayaan->keteranganusaha->dagang->id); ?>">
                                                                                :
                                                                                <?php echo e($pembiayaan->keteranganusaha->dagang->nama_jenisdagang); ?>

                                                                                </option>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Alamat Usaha</td>
                                                                            <td
                                                                                value="<?php echo e($pembiayaan->keteranganusaha->jenispasar->id); ?>">
                                                                                :
                                                                                Pasar
                                                                                <?php echo e($pembiayaan->keteranganusaha->jenispasar->nama_pasar); ?>

                                                                                </option>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">No Blok Kios / Los</td>
                                                                            <td>:
                                                                                <?php echo e($pembiayaan->keteranganusaha->no_blok); ?>

                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Kepemilikan Usaha</td>
                                                                            <td
                                                                                value="<?php echo e($pembiayaan->keteranganusaha->id); ?>">
                                                                                :
                                                                                <?php echo e($pembiayaan->keteranganusaha->kep_toko_id); ?>

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
                                                                            <td class="pe-1">Omset</td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    <?php echo e(number_format($pembiayaan->omset)); ?></span>
                                                                            </td>
                                                                        </tr>
                                                                        <div class="col-md-3">
                                                                            <tr>
                                                                                <td class="pe-1"> &emsp; HPP</td>
                                                                                <td>: Rp.
                                                                                    <?php echo e(number_format($pembiayaan->hpp)); ?>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">&emsp; Transport
                                                                                </td>
                                                                                <td>: Rp.
                                                                                    <?php echo e(number_format($pembiayaan->trasport)); ?>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">&emsp; Telpon</td>
                                                                                <td>: Rp.
                                                                                    <?php echo e(number_format($pembiayaan->telpon)); ?>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">&emsp; Listrik</td>
                                                                                <td>: Rp.
                                                                                    <?php echo e(number_format($pembiayaan->listrik)); ?>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">&emsp; Karyawan</td>
                                                                                <td>: Rp.
                                                                                    <?php echo e(number_format($pembiayaan->karyawan)); ?>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">&emsp; Sewa Kios /
                                                                                    Los
                                                                                </td>
                                                                                <td>: Rp.
                                                                                    <?php echo e(number_format($pembiayaan->sewa)); ?>

                                                                                </td>
                                                                            </tr>
                                                                        </div>
                                                                        
                                                                        <tr>
                                                                            <td class="pe-1 mt-2">Laba Bersih</td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    <?php echo e(number_format($pembiayaan->omset - ($pembiayaan->hpp + $pembiayaan->listrik + $pembiayaan->sewa + $pembiayaan->trasport + $pembiayaan->karyawan + $pembiayaan->telpon))); ?></span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <hr>
                                                                <h6 class="mb-1 mt-2">Pengeluaran :</h6>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Cicilan Bank BTB</td>
                                                                            <td>: Rp.
                                                                                <?php echo e(number_format($angsuran)); ?></span>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td class="pe-1">Cicilan Bank Lain</td>
                                                                            <td>: Rp. <?php echo e(number_format($cicilan)); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Kebutuhan Keluarga</td>
                                                                            <td>: Rp.
                                                                                <?php echo e(number_format($pengeluaran_lain)); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1 mt-1">Total Pengeluaran
                                                                            </td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    <?php echo e(number_format($total_pengeluaran)); ?></span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <hr>
                                                                <h6>Sisa Pendapatan Bersih : Rp.
                                                                    <?php echo e(number_format($laba_bersih - $total_pengeluaran)); ?>

                                                                </h6>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Address and Contact ends -->

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
                                                                <?php $__currentLoopData = $idebs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                                    <?php $__currentLoopData = $cicilanpasangans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ideppasangan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                            // if ($ideppasangan) {
                                                                            //     $margin = $ideppasangan->margin / 12 / 100;
                                                                            //     $plafond = $ideppasangan->plafond * $margin * $ideppasangan->tenor + $ideppasangan->plafond;
                                                                            //     $angsuran = $plafond / $ideppasangan->tenor;
                                                                            // }
                                                                        ?>
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

                                                    <hr class="invoice-spacing" />


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
                                                                                    <?php echo e(number_format($pembiayaan->harga)); ?></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Harga Jual</td>
                                                                            <td>: Rp. <?php echo e(number_format($harga_jual)); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Jangka Waktu</td>
                                                                            <td>: <?php echo e($pembiayaan->tenor); ?> bulan</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Equivalen Rate</td>
                                                                            <td>: <?php echo e($pembiayaan->rate); ?> %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Angsuran</td>
                                                                            <td>: Rp. <?php echo e(number_format($angsuran)); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1 mt-1">IDIR</td>
                                                                            <td><span class="fw-bold">:
                                                                                    <?php echo e($nilai_idir); ?>

                                                                                    %</span></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Invoice Description ends -->

                                                    <hr class="invoice-spacing" />


                                                </div>
                                            </div>
                                            <!-- /Invoice -->

                                            <!-- Invoice Actions -->
                                            <hr class="invoice-spacing" />

                                            <div class="card-body invoice-padding pb-0">
                                                <!-- Header starts -->
                                                <div
                                                    class="d-flex justify-content-center flex-xl-row flex-column invoice-spacing mt-0">
                                                    <div>
                                                        <h4>Summary Kabag</h4>
                                                        <hr>
                                                        <div class="table-responsive mt-1">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="text-align: center">No</th>
                                                                        <th style="text-align: center">Parameter
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
                                                                        <td>IDIR</td>
                                                                        <td>
                                                                            <?php echo e($idir->idir_rendah); ?>% -
                                                                            <?php echo e($idir->idir_tinggi); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($idir->bobot * 100); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rating_idir); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($score_idir); ?></td>
                                                                        <td style="text-align: center">
                                                                            <button type="button"
                                                                                class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#idir">
                                                                                <i data-feather="eye"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center">2</td>
                                                                        <td>Cash Pick Up</td>
                                                                        <td value="<?php echo e($cashs->id); ?>">
                                                                            <?php echo e($cashs->nama_jeniscash); ?>

                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($cashs->bobot * 100); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rating_cashpick); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($score_cashpick); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center">3</td>
                                                                        <td>Legalitas Kepemilikkan Rumah</td>
                                                                        <td value="<?php echo e($rumahs->id); ?>">
                                                                            <?php echo e($rumahs->nama_jaminan); ?>

                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rumahs->bobot * 100); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rating_jaminanrumah); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($score_jaminanrumah); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center">4</td>
                                                                        <td>Slik</td>
                                                                        <td><?php echo e($slik->kategori); ?>

                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($slik->bobot * 100); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rating_slik); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($score_slik); ?></td>
                                                                        <td style="text-align: center">
                                                                            <button type="button"
                                                                                class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#slik">
                                                                                <i data-feather="eye"></i>
                                                                            </button>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="text-align: center">5</td>
                                                                        <td>Jenis Nasabah</td>
                                                                        <td value="<?php echo e($nasabahs->id); ?>">
                                                                            <?php echo e($nasabahs->nama_jenisnasabah); ?>

                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($nasabahs->bobot * 100); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rating_jenisnasabah); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($score_jenisnasabah); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center">6</td>
                                                                        <td>Konfirmasi Kepala Pasar</td>
                                                                        <td>
                                                                            <?php echo e($kepalapasar->kategori); ?>

                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($kepalapasar->bobot * 100); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rating_kepalapasar); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($score_kepalapasar); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center">7</td>
                                                                        <td>Jaminan Kios</td>
                                                                        <td><?php echo e($jaminans->nama_jaminan); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($jaminans->bobot * 100); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rating_jaminanlain); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($score_jaminanlain); ?></td>
                                                                        <td style="text-align: center">
                                                                            <button type="button"
                                                                                class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#jaminankios">
                                                                                <i data-feather="eye"></i>
                                                                            </button>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center">8</td>
                                                                        <td>Lama Berdagang</td>
                                                                        <td value="<?php echo e($lamas->id); ?>">
                                                                            <?php echo e($lamas->nama_lamaberdagang); ?>

                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($lamas->bobot * 100); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rating_lamadagang); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($score_lamadagang); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center">9</td>
                                                                        <td>Jenis Dagangan</td>
                                                                        <td value="<?php echo e($dagangs->id); ?>">
                                                                            <?php echo e($dagangs->nama_jenisdagang); ?>

                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($dagangs->bobot * 100); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rating_jenisdagang); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($score_jenisdagang); ?></td>
                                                                        <td style="text-align: center">
                                                                            <button type="button"
                                                                                class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#fototoko">
                                                                                <i data-feather="eye"></i>
                                                                            </button>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center">10</td>
                                                                        <td>Suku Bangsa</td>
                                                                        <td value="<?php echo e($sukus->id); ?>">
                                                                            <?php echo e($sukus->nama_suku); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($sukus->bobot * 100); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rating_sukubangsa); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($score_sukubangsa); ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center">11</td>
                                                                        <td>Jenis Pasar</td>
                                                                        <td value="<?php echo e($pasars->id); ?>">
                                                                            <?php echo e($pasars->nama_pasar); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($pasars->bobot * 100); ?>%
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($rating_jenispasar); ?></td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($score_jenispasar); ?></td>
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
                                                            $total_score = $score_idir + $score_slik + $score_cashpick + $score_jaminanrumah + $score_kepalapasar + $score_lamadagang + $score_jenisnasabah + $score_jenisdagang + $score_sukubangsa + $score_jenispasar;
                                                        ?>
                                                        <div class="card-body invoice-padding pt-0">
                                                            <div class="row invoice-spacing">
                                                                <div class="col-xl-8 p-0">
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
                                                                                    <?php if($nilai_idir >= 80 || $nilai_idir < 0): ?>
                                                                                        <?php if($nilai_idir >= 80 && $total_score > 3): ?>
                                                                                            <span
                                                                                                class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                            <small
                                                                                                class="text-danger">*IDIR
                                                                                                > 80%</small>
                                                                                        <?php elseif($nilai_idir < 0 && $total_score > 3): ?>
                                                                                            <span
                                                                                                class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                            <small
                                                                                                class="text-danger">*Pengeluaran
                                                                                                >
                                                                                                Pendapatan</small>
                                                                                        <?php elseif($total_score > 2 || $total_score > 3): ?>
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
                                                                <div class="col-xl-4 p-10 mt-xl-0 mt-2">
                                                                    <p class="mb-1 fw-bold">Note :</p>
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="pe-1 mb-2">Nilai < 2 </td>
                                                                                <td>: <span class="fw-bold"><span
                                                                                            class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1 mb-2"><br>Nilai > 2
                                                                                    - 3
                                                                                </td>
                                                                                <td><br>: <span class="fw-bold"><span
                                                                                            class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                            Ulang</span></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1 mb-2"><br>Nilai > 3
                                                                                </td>
                                                                                <td><br>: <span class="fw-bold"><span
                                                                                            class="badge rounded-pill badge-glow bg-success">Diterima</span></span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Header ends -->
                                            </div>

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
                                                                    data-bs-toggle="modal" data-bs-target="#tolak_komite">
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
                                            <!-- Invoice Note ends -->
                                            <!-- add new card modal  -->
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

                                                            <!-- form -->
                                                            <form id="addNewCardValidation" class="row gy-1 gx-2 mt-75"
                                                                method="POST" action="/kabag/pasar/komite">
                                                                <?php echo csrf_field(); ?>

                                                                <div class="col-md-12">
                                                                    <label class="form-label"
                                                                        for="catatan">Catatan</label>
                                                                    <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                </div>
                                                                <input type="hidden" name="pasar_pembiayaan_id"
                                                                    value="<?php echo e($pembiayaan->id); ?>">
                                                                <input type="hidden" name="status_id" value=5>
                                                                <input type="hidden" name="user_id"
                                                                    value="<?php echo e(Auth::user()->id); ?>">

                                                                <div class="col-12 text-center">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1 mt-1">Submit</button>
                                                                    <button type="reset"
                                                                        class="btn btn-outline-secondary mt-1"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Invoice Actions -->

                                            <!-- add new card modal  -->
                                            <div class="modal fade" id="tolak_komite" tabindex="-1"
                                                aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-transparent">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                                            <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                Apakah Anda Yakin Untuk Menolak Proposal ?
                                                            </h1>
                                                            <p class="text-center"></p>

                                                            <!-- form -->
                                                            <form id="addNewCardValidation" class="row gy-1 gx-2 mt-75"
                                                                method="POST" action="/kabag/pasar/komite">
                                                                <?php echo csrf_field(); ?>

                                                                <div class="col-md-12">
                                                                    <label class="form-label"
                                                                        for="catatan">Catatan</label>
                                                                    <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                </div>
                                                                <input type="hidden" name="pasar_pembiayaan_id"
                                                                    value="<?php echo e($pembiayaan->id); ?>">
                                                                <input type="hidden" name="status_id" value=6>
                                                                <input type="hidden" name="user_id"
                                                                    value="<?php echo e(Auth::user()->id); ?>">

                                                                <div class="col-12 text-center">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1 mt-1">Submit</button>
                                                                    <button type="reset"
                                                                        class="btn btn-outline-secondary mt-1"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Invoice Actions -->

                                            <!-- add new card modal  -->
                                            <div class="modal fade" id="edit_proposal" tabindex="-1"
                                                aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-transparent">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                                            <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                Rekomendasi Revisi Proposal ?
                                                            </h1>
                                                            <p class="text-center"></p>

                                                            <!-- form -->
                                                            <form id="addNewCardValidation" class="row gy-1 gx-2 mt-75"
                                                                method="POST" action="/kabag/pasar/komite">
                                                                <?php echo csrf_field(); ?>

                                                                <div class="col-md-12">
                                                                    <label class="form-label"
                                                                        for="catatan">Catatan</label>
                                                                    <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                </div>
                                                                <input type="hidden" name="pasar_pembiayaan_id"
                                                                    value="<?php echo e($pembiayaan->id); ?>">
                                                                <input type="hidden" name="status_id" value=7>
                                                                <input type="hidden" name="user_id"
                                                                    value="<?php echo e(Auth::user()->id); ?>">

                                                                <div class="col-12 text-center">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1 mt-1">Submit</button>
                                                                    <button type="reset"
                                                                        class="btn btn-outline-secondary mt-1"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ add new card modal  -->

                                            <?php if($deviasi && $deviasi->dokumen_deviasi): ?>
                                                <div class="modal fade" id="dokumendeviasi" tabindex="-1"
                                                    aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-transparent">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body ">
                                                                <h3 class="text-center">Lampiran Dokumen Deviasi</h3>
                                                                <div class="card-body">
                                                                    <iframe
                                                                        src="<?php echo e(asset('storage/' . optional($deviasi)->dokumen_deviasi)); ?>"
                                                                        class="d-block w-100" height="1000"
                                                                        width='1000'></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>


                                        </div>
                                        <!-- Invoice Note ends -->
                                        <div class="tab-pane" id="identitas-pribadi" role="tabpanel"
                                            aria-labelledby="profile-tab-justified">
                                            <!-- post 1 -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0"><?php echo e(optional($fotodiri)->kategori); ?></h6>
                                                            <small class="text-muted">Diupload Pada :
                                                                <?php echo e(optional(optional($fotodiri)->created_at)->diffForhumans()); ?></small>
                                                        </div>
                                                    </div>
                                                    <!-- post img -->
                                                    <img class="img-fluid rounded mb-75"
                                                        src="<?php echo e(asset('storage/' . optional($fotodiri)->foto)); ?>"
                                                        alt="avatar img" />
                                                    <!--/ post img -->
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0"><?php echo e(optional($fotoktp)->kategori); ?></h6>
                                                            <small class="text-muted">Diupload Pada :
                                                                <?php echo e(optional(optional($fotoktp)->created_at)->diffForhumans()); ?></small>
                                                        </div>
                                                    </div>
                                                    <!-- post img -->
                                                    <img class="img-fluid rounded mb-75"
                                                        src="<?php echo e(asset('storage/' . optional($fotoktp)->foto)); ?>"
                                                        alt="avatar img" />
                                                    <!--/ post img -->
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0"><?php echo e(optional($fotodiribersamaktp)->kategori); ?></h6>
                                                            <small class="text-muted">Diupload Pada :
                                                                <?php echo e(optional(optional($fotodiribersamaktp)->created_at)->diffForhumans()); ?></small>
                                                        </div>
                                                    </div>
                                                    <!-- post img -->
                                                    <img class="img-fluid rounded mb-75"
                                                        src="<?php echo e(asset('storage/' . optional($fotodiribersamaktp)->foto)); ?>"
                                                        alt="avatar img" />
                                                    <!--/ post img -->
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0"><?php echo e(optional($fotokk)->kategori); ?></h6>
                                                            <small class="text-muted">Diupload Pada :
                                                                <?php echo e(optional(optional($fotokk)->created_at)->diffForhumans()); ?></small>
                                                        </div>
                                                    </div>
                                                    <!-- post img -->
                                                    <img class="img-fluid rounded mb-75"
                                                        src="<?php echo e(asset('storage/' . optional($fotokk)->foto)); ?>"
                                                        alt="avatar img" />
                                                    <!--/ post img -->
                                                </div>
                                            </div>

                                        </div>


                                        <div class="tab-pane" id="legalitas-agunan"
                                            role="tabpanel" aria-labelledby="messages-tab-justified">
                                            <?php $__currentLoopData = $jaminanusahas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jaminan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0"> Jaminan :
                                                                    <?php echo e($jaminans->nama_jaminan); ?>

                                                                </h6>
                                                                <h6 class="mb-0"><br>No KTB :
                                                                    <?php echo e($jaminan->no_ktb); ?>

                                                                </h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    <?php echo e($jaminan->created_at->diffForhumans()); ?></small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="<?php echo e(asset('storage/' . $jaminan->dokumenktb)); ?>"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $jaminanlainusahas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jaminanlainnya): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <small class="text-muted">Diupload Pada :
                                                                    <?php echo e($jaminanlainnya->created_at->diffForhumans()); ?></small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="<?php echo e(asset('storage/' . $jaminanlainnya->dokumen_jaminan)); ?>"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                        <div class="tab-pane" id="keuangan"
                                            role="tabpanel" aria-labelledby="keuangan-tab-justified">
                                            <?php if($nota): ?>
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0">
                                                                    <?php echo e($nota->kategori); ?>

                                                                </h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    <?php echo e($nota->created_at->diffForhumans()); ?></small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="<?php echo e(asset('storage/' . optional($nota)->foto)); ?>"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($bon_murabahah): ?>
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

                                        <div class="tab-pane" id="legalitas-usaha"
                                            role="tabpanel" aria-labelledby="legalitas-usaha-tab-justified">

                                            <!-- post 1 -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0">Foto Kios / Los :
                                                                <?php echo e(optional($fototoko)->kategori); ?>

                                                            </h6>
                                                            <small class="text-muted">Diupload Pada :
                                                                <?php echo e(optional(optional($fototoko)->created_at)->diffForhumans()); ?></small>
                                                        </div>
                                                    </div>
                                                    <!-- post img -->
                                                    <img class="img-fluid rounded mb-75"
                                                        src="<?php echo e(asset('storage/' . optional($fototoko)->foto)); ?>"
                                                        alt="avatar img" />
                                                    <!--/ post img -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="ideb" role="tabpanel"
                                            aria-labelledby="ideb-tab-justified">
                                            
                                            <iframe src="<?php echo e(asset('storage/' . optional($pembiayaan)->dokumen_keuangan)); ?>"
                                                class="d-block w-100" height='500' weight='800'></iframe>
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

                                                            <hr class="invoice-spacing" />
                                                            <p class="fw-bold"> Total SLA = <?php echo e($totalwaktu); ?></p>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Justified Tabs ends -->
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
                                                            <?php echo e(number_format($pembiayaan->harga)); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Harga Jual</td>
                                                    <td>: Rp. <?php echo e(number_format($harga_jual)); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Jangka Waktu</td>
                                                    <td>: <?php echo e($pembiayaan->tenor); ?> bulan</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Equivalen Rate</td>
                                                    <td>: <?php echo e($pembiayaan->rate); ?> %</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Angsuran</td>
                                                    <td>: Rp. <?php echo e(number_format($angsuran)); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Cicilan Bank Lain</td>
                                                    <td>: Rp. <?php echo e(number_format($cicilan)); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Pendapatan Bersih</td>
                                                    <td>: Rp. <?php echo e(number_format($laba_bersih - $total_pengeluaran)); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1 mt-1">IDIR</td>
                                                    <td><span class="fw-bold">:
                                                            <?php echo e($nilai_idir); ?>

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
                <div class="modal fade" id="slik" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
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
                                        <iframe src="<?php echo e(asset('storage/' . optional($pembiayaan)->dokumen_keuangan)); ?>"
                                            class="d-block w-100" height='500' weight='800'></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--akhir Slik -->
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
                                        <img src="<?php echo e(asset('storage/' . optional($fototoko)->foto)); ?>" class="d-block w-100"
                                            height='500' weight='800'>
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
                    <div class="modal-dialog modal-dialog-centered modal-lg">
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
                                        <img src="<?php echo e(asset('storage/' . optional($jaminan)->dokumenktb)); ?>" class="d-block w-100"
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('kabag::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/pasar/komite/lihat.blade.php ENDPATH**/ ?>