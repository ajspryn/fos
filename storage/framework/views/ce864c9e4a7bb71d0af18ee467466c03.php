<!-- Summary Identitas Nasabah -->
<div class="card-body invoice-padding pt-0">
    <div class="row invoice-spacing">
        <div class="col-xl-8 p-0">
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Nomor Aplikasi</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->nomor_aplikasi)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Tanggal Pengajuan</td>
                        <td>:
                            <?php echo e(strtoupper(strftime('%d %B %Y', strtotime($pembiayaan->tanggal_pengajuan)))); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Jenis Pembiayaan</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->jenis_pby_ultra_mikro)); ?>

                        </td>
                    </tr>


                    <tr>
                        <td class="pe-1">Nama AO</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->user->name)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Nama Petugas Lap.</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->petugasLapangan->nama)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Tanggal Kunjungan</td>
                        <td>:
                            <?php echo e(strtoupper(strftime('%d %B %Y', strtotime($pembiayaan->tanggal_kunjungan)))); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Tujuan Penggunaan</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->tujuan_pembiayaan)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Akad</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->akad)); ?>

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
                        <td class="pe-1">Jenis Kelamin</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->nasabah->jenis_kelamin)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Agama</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->nasabah->agama)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">No. Handphone</td>
                        <td>: <?php echo e($pembiayaan->nasabah->no_hp); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Alamat Domisili</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->nasabah->alamat_domisili)); ?>

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
                        <td class="pe-1">Usia Ketika Pengajuan</td>
                        <td>:
                            <?php echo e(Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir)->age); ?>

                            <?php
                                //Usia dalam bulan
                                $usiaInMonth = Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir)->age * 12;

                                // Max usia pengajuan 60 Tahun = 720 Bulan
                                $sisaUsia = 720 - $usiaInMonth;

                                $akhirPembiayaan = ($usiaInMonth + $pembiayaan->tenor) / 12;

                            ?>
                            TAHUN
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-xl-4 p-0 mt-xl-0 mt-2">
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Nama Pekerjaan/Usaha </td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->nasabah->nama_pekerjaan)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Penghasilan </td>
                        <td><span class="fw-bold">: Rp
                                <?php echo e(number_format($pembiayaan->penghasilan, 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pengeluaran </td>
                        <td>: Rp
                            <?php echo e(number_format($pembiayaan->pengeluaran, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pendapatan Bersih </td>
                        <td>: Rp
                            <?php echo e(number_format($pendapatanBersih, 0, ',', '.')); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
            
            <hr>
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Nominal Pembiayaan</td>
                        <td><span class="fw-bold">: Rp
                                <?php echo e(number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pe-1">Jangka Waktu</td>
                        <td>: <?php echo e($tenor); ?> Bulan</td>
                    </tr>
                    
                    <?php if($tenor > $sisaUsia): ?>
                        <tr>
                            <td class="pe-1" colspan="2" style="text-align: center;"><small class="text-danger">*
                                    Tenor
                                    melebihi batas usia maks. 60
                                    tahun!</small></td>
                        </tr>
                    <?php endif; ?>
                    
                    <tr>
                        <td class="pe-1">Angsuran</td>
                        <td>: Rp
                            <?php echo e(number_format($angsuran, 0, ',', '.')); ?>/Bulan
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pend. Bersih stl. Angsuran</td>
                        <td>: Rp
                            <?php echo e(number_format($pendapatanBersih - $angsuran, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Frekuensi Pembayaran</td>
                        <td>:
                            <?php echo e($pembiayaan->frekuensi_pembayaran); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Angsuran Per Kunjungan</td>
                        <td>: Rp
                            <?php echo e(number_format($angsuranPerKunjungan, 0, ',', '.')); ?>/<?php echo e($minggu); ?>

                        </td>
                    </tr>
                    <?php if($pendapatanBersih - $angsuran < 0): ?>
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
                                <?php echo e($dsr); ?>

                                %</span></td>
                    </tr>
                    <?php if($dsr > 75): ?>
                        <tr>
                            <td class="pe-1" colspan="2" style="text-align: center;"><small class="text-danger">*
                                    DSR melebihi
                                    75%!</small></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<!--/ Summary Identitas Nasabah -->


<hr class="invoice-spacing" />

<!-- Summary Score -->
<div class="card-body invoice-padding pb-0">
    <div class="d-flex justify-content-center flex-md-row flex-column invoice-spacing mt-0">
        <div class="col-md-10">
            <h4>Summary Score</h4>
            <hr>
            <div class="table-responsive mt-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="text-align: center; vertical-align:middle;">
                                No</th>
                            <th style="text-align: center; vertical-align:middle;">
                                Parameter
                            </th>
                            <th style="text-align: center; vertical-align:middle;">
                                Kategori
                            </th>
                            <th style="text-align: center; vertical-align:middle;">
                                Bobot
                            </th>
                            <th style="text-align: center; vertical-align:middle;">
                                Rating
                            </th>
                            <th style="text-align: center; vertical-align:middle;">
                                Nilai
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center">1</td>
                            <td>Repayment</td>
                            <td> <?php echo e($kategoriRepayment); ?>

                            </td>
                            <td style="text-align: center">
                                <?php echo e($bobotRepayment * 100); ?>%
                            </td>
                            <td style="text-align: center">
                                <?php echo e($ratingRepayment); ?></td>
                            <td style="text-align: center">
                                <?php echo e(number_format($scoreRepayment, 2, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">2</td>
                            <td>Tempat Tinggal</td>
                            <td> <?php echo e($kategoriStatusTempatTinggal); ?>

                            </td>
                            <td style="text-align: center">
                                <?php echo e($bobotStatusTempatTinggal * 100); ?>%
                            </td>
                            <td style="text-align: center">
                                <?php echo e($ratingStatusTempatTinggal); ?></td>
                            <td style="text-align: center">
                                <?php echo e(number_format($scoreStatusTempatTinggal, 2, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">3</td>
                            <td>Kolektibilitas Terburuk</td>
                            <td> <?php echo e($kategoriKol); ?>

                            </td>
                            <td style="text-align: center">
                                <?php echo e($bobotKol * 100); ?>%
                            </td>
                            <td style="text-align: center">
                                <?php echo e($ratingKol); ?></td>
                            <td style="text-align: center">
                                <?php echo e(number_format($scoreKol, 2, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">4</td>
                            <td>Status Kelompok</td>
                            <td> <?php echo e($kategoriStatusKelompok); ?>

                            </td>
                            <td style="text-align: center">
                                <?php echo e($bobotStatusKelompok * 100); ?>%
                            </td>
                            <td style="text-align: center">
                                <?php echo e($ratingStatusKelompok); ?></td>
                            <td style="text-align: center">
                                <?php echo e(number_format($scoreStatusKelompok, 2, ',', '.')); ?>

                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center">5</td>
                            <td>Usia</td>
                            <td><?php echo e($prosesUsia->usia_min); ?>

                                -
                                <?php echo e($prosesUsia->usia_maks); ?>

                                Tahun
                            </td>
                            <td style="text-align: center">
                                <?php echo e($bobotUsia * 100); ?>%
                            </td>
                            <td style="text-align: center">
                                <?php echo e($ratingUsia); ?></td>
                            <td style="text-align: center">
                                <?php echo e(number_format($scoreUsia, 2, ',', '.')); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr style="margin-top:-1px;" />
            </div>
            

            <div class="card-body invoice-padding pt-0">
                <div class="mb-0 mt-1 col-md-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#suratPermohonanRestruct">Surat Permohonan Restruct
                    </button>
                </div>
            </div>
            <?php
                $total_score =
                    $scoreRepayment + $scoreStatusTempatTinggal + $scoreKol + $scoreUsia + $scoreStatusKelompok;
            ?>

            <div class="card-body invoice-padding pt-0">
                <div class="row invoice-spacing">
                    <div class="col-xl-7 p-0">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="pe-1">Total Nilai
                                    </td>
                                    <td>:
                                        <?php echo e(number_format($total_score, 2, ',', '.')); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1">Status</td>
                                    <td>:
                                        <?php if($dsr > 75 || ($dsr < 0 || ($tenor > $sisaUsia && $total_score >= 3.0))): ?>
                                            <?php if($dsr > 75 && $total_score >= 2): ?>
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                <small class="text-danger">
                                                    *DSR
                                                    > 75%</small>
                                            <?php elseif($dsr < 0 && $total_score >= 2): ?>
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            <?php elseif($tenor > $sisaUsia && $total_score >= 2): ?>
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            <?php elseif($total_score >= 1 && $total_score <= 1.99): ?>
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            <?php else: ?>
                                                <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($total_score >= 2 && $tenor <= $sisaUsia): ?>
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                            <?php elseif($total_score >= 1 && $total_score <= 1.99): ?>
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            <?php else: ?>
                                                <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mt-1">Keterangan
                                    </td>
                                    <td>:
                                        <?php if($dsr <= 75): ?>
                                            <small class="text-success">DSR
                                                ≤ 75% </small>
                                        <?php else: ?>
                                            <small class="text-danger">DSR
                                                > 75% </small>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mt-1"></td>
                                    <td>
                                        <?php if($tenor <= $sisaUsia): ?>
                                            <small class="text-success">
                                                &nbsp; Akhir tenor
                                                pembiayaan ≤ 60
                                                tahun
                                            </small>
                                        <?php else: ?>
                                            <small class="text-danger">
                                                &nbsp; Akhir tenor
                                                pembiayaan > 60
                                                tahun
                                            </small>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mt-1"></td>
                                    <td>
                                        <?php if($pendapatanBersih - $angsuran < 0): ?>
                                            <small class="text-danger">
                                                &nbsp; Pendapatan < Pengeluaran </small>
                                                <?php else: ?>
                                                    <small class="text-success">
                                                        &nbsp;
                                                        Pendapatan >
                                                        Pengeluaran
                                                    </small>
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
                                    <td class="pe-1 mb-2">Nilai < 1,00 </td>
                                    <td>: <span class="fw-bold"><span
                                                class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mb-2"><br>Nilai ≥
                                        1,00 - 1,99
                                    </td>
                                    <td><br>: <span class="fw-bold"><span
                                                class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                Ulang</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mb-2"><br>Nilai ≥
                                        2,00 - 5,00
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
            <!-- Invoice Note ends -->
        </div>
    </div>
    <!-- Header ends -->
</div>
<!--/ Summary Score -->
<?php /**PATH /Users/ajspryn/Project/fos/Modules/UltraMikro/Resources/views/komite/summary-ultra-mikro.blade.php ENDPATH**/ ?>