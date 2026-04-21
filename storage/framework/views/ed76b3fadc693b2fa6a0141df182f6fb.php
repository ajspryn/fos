<!-- Address and Contact starts -->
<div class="card-body invoice-padding pt-0">
    <div class="row invoice-spacing">
        <div class="col-xl-8 p-0">
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Tanggal Pengajuan</td>
                        <td>:
                            <?php echo e(strtoupper(strftime('%d %B %Y', strtotime($pembiayaan->tgl_pembiayaan)))); ?>

                        </td>
                                </tr>
                    <tr>
                        <td class="pe-1">Penggunaan</td>
                        <td>: <?php echo e($pembiayaan->penggunaan_id); ?></td>
                                </tr>
                    <tr>
                        <td class="pe-1">Sektor</td>
                        <td value="<?php echo e($pembiayaan->sektor->id); ?>">:
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
                        <td>: <?php echo e($pembiayaan->nasabahh->no_tlp); ?></td>
                                </tr>
                    <tr>
                        <td class="pe-1">Alamat</td>
                        <td>: <?php echo e($pembiayaan->nasabahh->alamat); ?>,
                            <?php echo e($pembiayaan->nasabahh->rt); ?>,
                            <?php echo e($pembiayaan->nasabahh->rw); ?>,
                            <?php echo e($pembiayaan->nasabahh->desa_kelurahan); ?>,
                            <?php echo e($pembiayaan->nasabahh->kecamatan); ?>,
                            <?php echo e($pembiayaan->nasabahh->kabkota); ?>,
                            <?php echo e($pembiayaan->nasabahh->provinsi); ?></td>
                                </tr>
                    <tr>
                        <td class="pe-1">No KTP</td>
                        <td>: <?php echo e($pembiayaan->nasabahh->no_ktp); ?></td>
                                </tr>
                    <tr>
                        <td class="pe-1">Tempat/Tgl Lahir</td>
                        <td>:
                            <?php echo e($pembiayaan->nasabahh->tmp_lahir); ?> /
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
                        <td value="<?php echo e($pembiayaan->keteranganusaha->dagang->id); ?>">
                            :
                            <?php echo e($pembiayaan->keteranganusaha->dagang->nama_jenisdagang); ?>

                            </option>
                        </td>
                                </tr>
                    <tr>
                        <td class="pe-1">Kepemilikan Usaha</td>
                        <td value="<?php echo e($pembiayaan->keteranganusaha->id); ?>">
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
                                <?php echo e(number_format($pembiayaan->omset, 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                    <div class="col-md-3">
                        <tr>
                            <td class="pe-1"> &emsp; HPP</td>
                            <td>: Rp.
                                <?php echo e(number_format($pembiayaan->hpp, 0, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1">&emsp; Transport</td>
                            <td>: Rp.
                                <?php echo e(number_format($pembiayaan->trasport, 0, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1">&emsp; Telpon</td>
                            <td>: Rp.
                                <?php echo e(number_format($pembiayaan->telpon, 0, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1">&emsp; Listrik</td>
                            <td>: Rp.
                                <?php echo e(number_format($pembiayaan->listrik, 0, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1">&emsp; Karyawan</td>
                            <td>: Rp.
                                <?php echo e(number_format($pembiayaan->karyawan, 0, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1">&emsp; Sewa Kios / Los
                            </td>
                            <td>: Rp.
                                <?php echo e(number_format($pembiayaan->sewa, 0, ',', '.')); ?>

                            </td>
                        </tr>
                    </div>
                    
                    <tr>
                        <td class="pe-1 mt-2">Laba Bersih</td>
                        <td><span class="fw-bold">: Rp.
                                <?php echo e(number_format($laba_bersih, 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                    <?php if($pembiayaan->pendapatan_lain > 0): ?>
                        <tr>
                            <td class="pe-1 mt-2">Pendapatan Lain</td>
                            <td><span>: Rp.
                                    <?php echo e(number_format($pembiayaan->pendapatan_lain, 0, ',', '.')); ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1 mt-2">Keterangan Pendapatan
                                Lain</td>
                            <td><span>:
                                    <?php echo e($pembiayaan->ket_pendapatan_lain); ?></span>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td class="pe-1 mt-2">Total Pendapatan</td>
                        <td><span class="fw-bold">: Rp.
                                <?php echo e(number_format($total_pendapatan_bersih, 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h6 class="mb-1 mt-2">Pengeluaran :</h6>
            <table>
                <tbody>
                    

                    <tr>
                        <td class="pe-1">Cicilan Bank Lain</td>
                        <td>: Rp.
                            <?php echo e(number_format($cicilan, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Kebutuhan Keluarga</td>
                        <td>: Rp.
                            <?php echo e(number_format($pengeluaran_lain, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1 mt-1">Total Pengeluaran</td>
                        <td><span class="fw-bold">: Rp.
                                <?php echo e(number_format($total_pengeluaran, 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h6>Sisa Pendapatan Bersih : Rp.
                <?php echo e(number_format($total_pendapatan_bersih - $total_pengeluaran, 0, ',', '.')); ?>

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
            <th style="text-align: center">Action</th>
                                    </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $idebs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sliknasabah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align: center">
                        <?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($sliknasabah->nama_bank); ?></td>
                    <td>Rp.
                        <?php echo e(number_format($sliknasabah->plafond, 0, ',', '.')); ?>

                    </td>
                    <td>Rp.
                        <?php echo e(number_format($sliknasabah->outstanding, 0, ',', '.')); ?>

                    </td>
                    <td style="text-align: center">i
                        <?php echo e($sliknasabah->tenor); ?>

                    </td>
                    <td style="text-align: center">
                        <?php echo e(number_format($sliknasabah->margin)); ?>%
                    </td>
                    <td>Rp.
                        <?php echo e(number_format($sliknasabah->angsuran, 0, ',', '.')); ?>

                    </td>
                    <td style="text-align: center">
                        <?php echo e($sliknasabah->agunan); ?>

                    </td>
                    <td style="text-align: center">
                        <?php echo e($sliknasabah->kol_tertinggi); ?></td>
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
                            <?php echo e(number_format($ideppasangan->margin)); ?>%
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
                        <td>: <?php echo e($pembiayaan->tenor); ?> bulan</td>
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
                            <?php echo e(number_format($angsuran, 0, ',', '.')); ?>

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

<div class="card-body invoice-padding pb-0">
    <!-- Header starts -->
    <div class="d-flex justify-content-center flex-xl-row flex-column invoice-spacing mt-0">
        <div>
            <h4>Summary</h4>
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
                                <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                    data-bs-toggle="modal" data-bs-target="#idir">
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
                                <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                    data-bs-toggle="modal" data-bs-target="#slik">
                                    <i data-feather="eye"></i>
                                </button>
                            </td>
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
                                <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                    data-bs-toggle="modal" data-bs-target="#jaminankios">
                                    <i data-feather="eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">7</td>
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
                            <td style="text-align: center">8</td>
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
                                <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                    data-bs-toggle="modal" data-bs-target="#fototoko">
                                    <i data-feather="eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">9</td>
                            <td>Suku Bangsa</td>
                            <td value="<?php echo e(optional($sukus)->id); ?>">
                                <?php echo e(optional($sukus)->nama_suku ?? '-'); ?></td>
                            <td style="text-align: center">
                                <?php echo e((optional($sukus)->bobot ?? 0) * 100); ?>%
                            </td>
                            <td style="text-align: center">
                                <?php echo e($rating_sukubangsa); ?></td>
                            <td style="text-align: center">
                                <?php echo e($score_sukubangsa); ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <?php
                $total_score = $score_idir + $score_slik + $score_cashpick + $score_jaminanrumah + $score_lamadagang + $score_jenisnasabah + $score_jenisdagang + $score_sukubangsa;
            ?>
            <div class="card-body invoice-padding pt-0">
                <div class="row invoice-spacing">
                    <div class="col-xl-8 p-0">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="pe-1"><br>Total Nilai
                                    </td>
                                    <td><br>: <?php echo e($total_score); ?></td>
                                </tr>
                                <tr>
                                    <td class="pe-1">Status</td>
                                    <td>:
                                        <?php if($nilai_idir >= 80 || $nilai_idir < 0): ?>
                                            <?php if($nilai_idir >= 80 && $total_score > 3): ?>
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                <small class="text-danger">*IDIR
                                                    > 80%</small>
                                            <?php elseif($nilai_idir < 0 && $total_score > 3): ?>
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                <small class="text-danger">*Pengeluaran
                                                    >
                                                    Pendapatan</small>
                                            <?php elseif($total_score > 2 || $total_score < 3): ?>
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            <?php else: ?>
                                                <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($total_score > 3): ?>
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                            <?php elseif($total_score > 2 || $total_score > 3): ?>
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            <?php else: ?>
                                                <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xl-4 p-10 mt-xl-0 mt-2">
                        <p class="mb-1 fw-bold"><br>Note :</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="pe-1 mb-2">Nilai ≤ 2.0
                                    </td>
                                    <td>: <span class="fw-bold"><span
                                                class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mb-2"><br>Nilai >
                                        2.0
                                        - 3.0
                                    </td>
                                    <td><br>: <span class="fw-bold"><span
                                                class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                Ulang</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mb-2"><br>Nilai >
                                        3.0
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

<hr class="invoice-spacing" />
<?php /**PATH /Users/ajspryn/Project/fos/Modules/Umkm/Resources/views/komite/summary-umkm.blade.php ENDPATH**/ ?>