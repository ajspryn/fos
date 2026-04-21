<!-- Summary Identitas Nasabah -->
<div class="card-body invoice-padding pt-0">
    <div class="row invoice-spacing">
        <div class="col-xl-8 p-0">
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Tanggal Pengajuan</td>
                        <td>:
                            <?php echo e(strtoupper(strftime('%d %B %Y', strtotime($pembiayaan->tanggal_pengajuan)))); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Nama AO</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->user->name)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Penggunaan</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->jenis_penggunaan->jenis_penggunaan)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Sektor</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->sektor->nama_sektor_ekonomi)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Akad</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->akad->nama_akad)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Nama Nasabah</td>
                        <td><span class="fw-bold">:
                                <?php echo e(strtoupper($pembiayaan->nasabah->nama_nasabah)); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">No. KTP</td>
                        <td>: <?php echo e($pembiayaan->nasabah->no_ktp); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">No. Telepon</td>
                        <td>: <?php echo e($pembiayaan->nasabah->no_telp); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Alamat</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->nasabah->alamat)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Tempat, Tanggal Lahir</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->nasabah->tempat_lahir)); ?>,
                            <?php echo e(strtoupper(strftime('%d %B %Y', strtotime($pembiayaan->nasabah->tgl_lahir)))); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Usia</td>
                        <td>:
                            <?php echo e(Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir)->age); ?>

                            TAHUN
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Kantor/Dinas</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->instansi->nama_instansi)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Golongan</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->golongan->nama_golongan)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Jabatan</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->jabatan)); ?>

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
                                <?php echo e(number_format($pembiayaan->gaji_pokok, 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pendapatan Lainnya</td>
                        <td>: Rp.
                            <?php echo e(number_format($pembiayaan->pendapatan_lainnya, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Gaji TPP</td>
                        <td>: Rp.
                            <?php echo e(number_format($pembiayaan->gaji_tpp, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1 mt-2">Total Pendapatan</td>
                        <td><span class="fw-bold">: Rp.
                                <?php echo e(number_format($pembiayaan->pendapatan_lainnya + $pembiayaan->gaji_pokok + $pembiayaan->gaji_tpp, 0, ',', '.')); ?></span>
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
                                <?php echo e(number_format($cicilan, 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Potongan Lainnya</td>
                        <td>: Rp.
                            <?php echo e(number_format($pembiayaan->potongan_lainnya, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Kebutuhan Keluarga</td>
                        <td>: Rp.
                            <?php echo e(number_format($biayakeluarga, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1 mt-1">Total Pengeluaran
                        </td>
                        <td><span class="fw-bold">: Rp.
                                <?php echo e(number_format($cicilan + $pembiayaan->potongan_lainnya + $biayakeluarga, 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h6>Sisa Pendapatan Bersih : Rp.
                <?php echo e(number_format($pendapatan_bersih, 0, ',', '.')); ?>

            </h6>
            <hr>
        </div>
    </div>
</div>
<!--/ Summary Identitas Nasabah -->

<!-- Informasi Debitur Nasabah -->
<div class="table-responsive">
    <h4>Informasi Debitur Nasabah</h4>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align: center;  vertical-align:middle;; width: 5%;" class="py-1">No</th>
                <th style="text-align: center;  vertical-align:middle;" class="py-1">Nama
                    Bank</th>
                <th style="text-align: center;  vertical-align:middle;" class="py-1">
                    Plafond
                </th>
                <th style="text-align: center;  vertical-align:middle;" class="py-1">
                    Outstanding</th>
                <th style="text-align: center;  vertical-align:middle;" class="py-1">
                    Tenor
                </th>
                <th style="text-align: center;  vertical-align:middle;" class="py-1">
                    Margin
                </th>
                <th style="text-align: center;  vertical-align:middle;" class="py-1">
                    Angsuran
                </th>
                <th style="text-align: center;  vertical-align:middle;" class="py-1">
                    Agunan
                </th>
                <th style="text-align: center;  vertical-align:middle;" class="py-1">Kol
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
                    <td>Rp.
                        <?php echo e(number_format($idep->plafond, 0, ',', '.')); ?>

                    </td>
                    <td>Rp.
                        <?php echo e(number_format($idep->outstanding, 0, ',', '.')); ?>

                    </td>
                    <td style="text-align: center">
                        <?php echo e($idep->tenor); ?>

                    </td>
                    <td style="text-align: center">
                        <?php echo e(number_format($idep->margin, 2, ',', '.')); ?>%
                    </td>
                    <td>Rp.
                        <?php echo e(number_format($idep->angsuran, 0, ',', '.')); ?>

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
    <hr style="margin-top:-1px;" />
</div>
<?php if($cekcicilanpasangan > 0): ?>
    <br>
    <div class="table-responsive">
        <small>Informasi Debitur Pasangan Nasabah</small>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center; width: 5%;" class="py-1">No</th>
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
                            <?php echo e(number_format($ideppasangan->plafond, 0, ',', '.')); ?>

                        </td>
                        <td>Rp.
                            <?php echo e(number_format($ideppasangan->outstanding, 0, ',', '.')); ?>

                        </td>
                        <td style="text-align: center">
                            <?php echo e($ideppasangan->tenor); ?>

                        </td>
                        <td style="text-align: center">
                            <?php echo e(number_format($ideppasangan->margin, 2, ',', '.')); ?>%
                        </td>
                        <td>Rp.
                            <?php echo e(number_format($ideppasangan->angsuran, 0, ',', '.')); ?>

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
                                <?php echo e(number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Harga Jual</td>
                        <td>: Rp.
                            <?php echo e(number_format($harga_jual, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Jangka Waktu</td>
                        <td>: <?php echo e($tenor); ?></td>
                    </tr>
                    <tr>
                        <td class="pe-1">Equivalen Rate</td>
                        <td>:
                            <?php echo e(number_format($pembiayaan->rate, 2, ',', '.')); ?>

                            %</td>
                    </tr>
                    <tr>
                        <td class="pe-1">Angsuran</td>
                        <td>: Rp.
                            <?php echo e(number_format($angsuran1, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pendapatan Bersih Stl. Angs.
                        </td>
                        <td>: Rp.
                            <?php echo e(number_format($pendapatan_bersih - $angsuran1, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <?php if($pendapatan_bersih - $angsuran1 < 0): ?>
                        <tr>
                            <td class="pe-1" colspan="2" style="text-align: center;"><small class="text-danger">*
                                    Pendapatan
                                    bersih
                                    tidak mencukupi!</small></td>
                        </tr>
                    <?php endif; ?>
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
<!--/ Informasi Debitur Nasabah -->

<hr class="invoice-spacing" />
<?php /**PATH /Users/ajspryn/Project/fos/Modules/Skpd/Resources/views/komite/summary-skpd.blade.php ENDPATH**/ ?>