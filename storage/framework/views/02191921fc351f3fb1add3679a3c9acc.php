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
                        <td class="pe-1">Pengajuan Fas. Aktif Ke-</td>
                        <td>:
                            <?php echo e($pembiayaan->pengajuan_fas_aktif_ke); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Nama AO</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->user->name)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Tujuan Penggunaan</td>
                        <td>:
                            <?php echo e(strtoupper($pembiayaan->jenis_penggunaan)); ?>

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
                        <td class="pe-1">Tinggi Badan</td>
                        <td>: <?php echo e($pembiayaan->nasabah->tinggi_badan); ?>

                            cm
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Berat Badan</td>
                        <td>: <?php echo e($pembiayaan->nasabah->berat_badan); ?> kg
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">No. Telepon</td>
                        <td>: <?php echo e($pembiayaan->nasabah->no_telp); ?>

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
                            <?php echo e(strtoupper($pembiayaan->nasabah->alamat_domisili)); ?>,
                            RT
                            <?php echo e($pembiayaan->nasabah->rt_domisili); ?>/RW
                            <?php echo e($pembiayaan->nasabah->rw_domisili); ?>,
                            <?php echo e(strtoupper($pembiayaan->nasabah->desa_kelurahan_domisili)); ?>,
                            <?php echo e(strtoupper($pembiayaan->nasabah->kabkota_domisili)); ?>

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

                            TAHUN
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-xl-4 p-0 mt-xl-0 mt-2">
            <h6 class="mb-1">Pekerjaan :</h6>
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Dinas</td>
                        <td>:
                            <?php echo e(strtoupper(optional($pembiayaan->nasabah->pekerjaan)->dinas ?? '-')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Unit Kerja</td>
                        <td>:
                            <?php echo e(strtoupper(optional($pembiayaan->nasabah->pekerjaan)->nama_unit_kerja ?? '-')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Jabatan</td>
                        <td>:
                            <?php echo e(strtoupper(optional($pembiayaan->nasabah->pekerjaan)->jabatan ?? '-')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">No. SK</td>
                        <td>:
                            <?php echo e(optional($pembiayaan->nasabah->pekerjaan)->no_sk ?? '-'); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h6 class="mb-1 mt-2">Pendapatan :</h6>
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Gaji Pokok</td>
                        <td><span class="fw-bold">: Rp
                                <?php echo e(number_format((float)($pembiayaan->gaji_pokok ?? 0), 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Gaji TPP</td>
                        <td>: Rp
                            <?php echo e(number_format((float)($pembiayaan->gaji_tpp ?? 0), 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1 mt-2">Total Pendapatan</td>
                        <td><span class="fw-bold">: Rp
                                <?php echo e(number_format((float)($pembiayaan->gaji_pokok ?? 0) + (float)($pembiayaan->gaji_tpp ?? 0), 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                    <?php if($pembiayaan->nasabah->status_pernikahan == 'Menikah'): ?>
                        <tr>
                            <td class="pe-1">Gaji Pasangan</td>
                            <td>: Rp
                                <?php echo e(number_format((float)($pembiayaan->gaji_pasangan ?? 0), 0, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1 mt-2">Total Pendapatan Join
                                Income</td>
                            <td><span class="fw-bold">: Rp
                                    <?php echo e(number_format((float)($pembiayaan->gaji_pokok ?? 0) + (float)($pembiayaan->gaji_tpp ?? 0) + (float)($pembiayaan->gaji_pasangan ?? 0), 0, ',', '.')); ?></span>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <hr>
            <h6 class="mb-1 mt-2">Pengeluaran :</h6>
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Angsuran BTB (Fas. Aktif)</td>
                        <td>: Rp
                            <?php echo e(number_format((float)($pembiayaan->total_angsuran_btb_fas_aktif ?? 0), 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pengeluaran Lainnya</td>
                        <td>: Rp
                            <?php echo e(number_format((float)($pembiayaan->pengeluaran_lainnya ?? 0), 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Total Pengeluaran</td>
                        <td><span class="fw-bold">: Rp
                                <?php echo e(number_format((float)($pembiayaan->total_angsuran_btb_fas_aktif ?? 0) + (float)($pembiayaan->pengeluaran_lainnya ?? 0), 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <?php
                if (!isset($pendapatanBersih)) {
                    $pendapatanBersih = ($pembiayaan->gaji_pokok ?? 0) + ($pembiayaan->gaji_tpp ?? 0) - (($pembiayaan->total_angsuran_btb_fas_aktif ?? 0) + ($pembiayaan->pengeluaran_lainnya ?? 0));
                }
                if (!isset($pendapatanBersihJoinIncome)) {
                    $pendapatanBersihJoinIncome = $pendapatanBersih + ($pembiayaan->gaji_pasangan ?? 0);
                }
            ?>

            <h6>Sisa Pendapatan Bersih : Rp
                <?php if($pembiayaan->nasabah->status_pernikahan == 'Menikah'): ?>
                    <?php echo e(number_format($pendapatanBersihJoinIncome, 0, ',', '.')); ?>

                <?php else: ?>
                    <?php echo e(number_format($pendapatanBersih, 0, ',', '.')); ?>

                <?php endif; ?>
            </h6>
            <hr>
        </div>
    </div>
</div>
<!--/ Summary Identitas Nasabah -->



<!-- Summary Harga -->
<div class="card-body invoice-padding pb-0">
    <div class="row invoice-sales-total-wrapper">
        <div class="col-md-8 order-md-1 order-2 mt-md-0 mt-3">
            <p class="card-text mb-0">
            </p>
        </div>
        <div class="col-md-4 d-flex order-md-2 order-1">
            <table>
                <tbody>
                    <?php
                        if (!isset($hargaJual)) {
                            // fallback: simple markup price = nominal + margin (if rate available)
                            $rate = $pembiayaan->rate ?? 0;
                            $hargaJual = $pembiayaan->nominal_pembiayaan + (($pembiayaan->nominal_pembiayaan * ($rate / 100)) ?? 0);
                        }
                        if (!isset($byAdm)) {
                            $byAdm = $pembiayaan->biaya_adm ?? 0;
                        }
                        if (!isset($akhirPembiayaan)) {
                            try {
                                $usia = Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir)->age ?? 0;
                            } catch (Exception $e) {
                                $usia = 0;
                            }
                            $tenorMonths = $tenor ?? ($pembiayaan->tenor ?? 0);
                            $akhirPembiayaan = $usia + ($tenorMonths / 12);
                        }
                        if (!isset($sisaUsia)) {
                            // default maximum age 58
                            $sisaUsia = 58 - (isset($usia) ? $usia : (Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir)->age ?? 0));
                        }
                    ?>
                    <?php
                        // Ensure $dsr is a numeric percentage. Some controllers pass an object
                        // (e.g. SkpdScoreDsr) as `dsr` while the numeric value is provided
                        // in `nilai_dsr` or `nilai_dsr1`. Normalize to a number for comparisons.
                        if (isset($dsr) && is_object($dsr)) {
                            if (isset($nilai_dsr)) {
                                $dsr = $nilai_dsr;
                            } elseif (isset($nilai_dsr1)) {
                                $dsr = $nilai_dsr1;
                            } else {
                                $dsr = 0;
                            }
                        }
                        $dsr = isset($dsr) && is_numeric($dsr) ? (float) $dsr : 0;

                        // Ensure some commonly expected variables have safe defaults
                        $tenor = $tenor ?? ($pembiayaan->tenor ?? 0);
                        $dsrJoinIncome = $dsrJoinIncome ?? 0;
                        $deviasi = $deviasi ?? null;
                    ?>
                    <?php
                        // Safe fallbacks for tenor scoring variables when controller omitted them
                        if (!isset($prosesTenor) || !is_object($prosesTenor)) {
                            $prosesTenor = (object) [
                                'tenor_min' => 0,
                                'tenor_maks' => isset($tenor) ? $tenor : ($pembiayaan->tenor ?? 0),
                            ];
                        }

                        $bobotTenor = $bobotTenor ?? 0;
                        $ratingTenor = $ratingTenor ?? 0;
                        $scoreTenor = $scoreTenor ?? ($ratingTenor * $bobotTenor);
                    ?>
                    <tr>
                        <td class="pe-1">Harga Beli</td>
                        <td><span class="fw-bold">: Rp
                                <?php echo e(number_format((float)($pembiayaan->nominal_pembiayaan ?? 0), 0, ',', '.')); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">
                            <?php if($pembiayaan->akad == 'Murabahah'): ?>
                                Margin
                            <?php else: ?>
                                Ujrah
                            <?php endif; ?>
                        </td>
                        <td>: Rp
                            <?php echo e(number_format($hargaJual - $pembiayaan->nominal_pembiayaan, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Harga Jual</td>
                        <td>: Rp
                            <?php echo e(number_format($hargaJual, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Biaya Administrasi</td>
                        <td>: Rp
                            <?php echo e(number_format($byAdm, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Jangka Waktu</td>
                        <td>: <?php echo e($tenor); ?> Bulan</td>
                    </tr>
                    <tr>
                        <td class="pe-1">Usia Akhir Pembiayaan</td>
                        <td>: <?php if(is_float($akhirPembiayaan)): ?>
                                <?php echo e(number_format($akhirPembiayaan, 1, ',', '.')); ?>

                            <?php else: ?>
                                <?php echo e($akhirPembiayaan); ?>

                            <?php endif; ?>
                            Tahun
                        </td>
                    </tr>
                    <?php if($tenor > $sisaUsia): ?>
                        <tr>
                            <td class="pe-1" colspan="2" style="text-align: center;"><small class="text-danger">*
                                    Tenor
                                    melebihi batas usia maks. 58
                                    tahun!</small></td>
                        </tr>
                    <?php endif; ?>
                    <?php
                        if (!isset($angsuran)) {
                            $months = $tenor ?? ($pembiayaan->tenor ?? 1);
                            $principal = $hargaJual ?? ($pembiayaan->nominal_pembiayaan ?? 0);
                            $adm = $byAdm ?? ($pembiayaan->biaya_adm ?? 0);
                            $angsuran = 0;
                            if ($months > 0) {
                                $angsuran = (int) round(($principal + $adm) / $months);
                            }
                        }
                    ?>
                    <tr>
                        <td class="pe-1">Equivalen Rate</td>
                        <td>:
                            <?php echo e(number_format((float)($pembiayaan->rate ?? 0), 2, ',', '.')); ?>

                            %</td>
                    </tr>
                    <tr>
                        <td class="pe-1">Angsuran</td>
                        <td>: Rp
                            <?php echo e(number_format($angsuran, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pend. Bersih stl. Angsuran</td>
                        <td>: Rp
                            <?php if($pembiayaan->nasabah->status_pernikahan == 'Menikah'): ?>
                                <?php echo e(number_format($pendapatanBersihJoinIncome - $angsuran, 0, ',', '.')); ?>

                            <?php else: ?>
                                <?php echo e(number_format($pendapatanBersih - $angsuran, 0, ',', '.')); ?>

                            <?php endif; ?>
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
                    <?php if($dsr > 90): ?>
                        <tr>
                            <td class="pe-1" colspan="2" style="text-align: center;"><small class="text-danger">*
                                    DSR melebihi
                                    90%!</small></td>
                        </tr>
                    <?php endif; ?>
                    <?php if($pembiayaan->nasabah->status_pernikahan == 'Menikah'): ?>
                        <tr>
                            <td class="pe-1 mt-1">DSR Join Income</td>
                            <td><span class="fw-bold">:
                                    <?php echo e($dsrJoinIncome); ?>

                                    %</span></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--/ Summary Harga -->

<hr class="invoice-spacing" />

<!-- Summary Score -->
<?php
    // Safe fallbacks for DSR scoring variables when controller omitted them
    if (!isset($prosesDsr) || !is_object($prosesDsr)) {
        $prosesDsr = (object) [
            'id' => 0,
            'nilai_min' => 0,
            'nilai_maks' => 0,
            'bobot' => 0,
            'rating' => 0,
        ];
    }

    $bobotDsr = $bobotDsr ?? ($prosesDsr->bobot ?? 0);
    $ratingDsr = $ratingDsr ?? ($prosesDsr->rating ?? 0);
    $scoreDsr = $scoreDsr ?? ($ratingDsr * $bobotDsr);
?>
<?php
    // Safe fallbacks for Usia scoring variables when controller omitted them
    if (!isset($prosesUsia) || !is_object($prosesUsia)) {
        $prosesUsia = (object) [
            'usia_min' => 0,
            'usia_maks' => 0,
            'bobot' => 0,
            'rating' => 0,
        ];
    }

    $bobotUsia = $bobotUsia ?? ($prosesUsia->bobot ?? 0);
    $ratingUsia = $ratingUsia ?? ($prosesUsia->rating ?? 0);
    $scoreUsia = $scoreUsia ?? ($ratingUsia * $bobotUsia);
?>
<div class="card-body invoice-padding pb-0">
    <div class="d-flex justify-content-center flex-md-row flex-column invoice-spacing mt-0">
        <div class="col-md-10">
            <h4>Summary</h4>
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
                            <td>Tenor</td>
                            <td> <?php echo e($prosesTenor->tenor_min); ?>

                                -
                                <?php echo e($prosesTenor->tenor_maks); ?> Bulan
                            </td>
                            <td style="text-align: center">
                                <?php echo e($bobotTenor * 100); ?>%
                            </td>
                            <td style="text-align: center">
                                <?php echo e($ratingTenor); ?></td>
                            <td style="text-align: center">
                                <?php echo e(number_format($scoreTenor, 1, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">2</td>
                            <td>DSR</td>
                            <td>
                                <?php if($prosesDsr->id == 5): ?>
                                    <?php echo e('> 90%'); ?>

                                <?php else: ?>
                                    <?php echo e($prosesDsr->nilai_min); ?>%
                                    -
                                    <?php echo e($prosesDsr->nilai_maks); ?>%
                                <?php endif; ?>
                            </td>
                            <td style="text-align: center">
                                <?php echo e($bobotDsr * 100); ?>%</td>
                            <td style="text-align: center">
                                <?php echo e($ratingDsr); ?></td>
                            <td style="text-align: center">
                                <?php echo e(number_format($scoreDsr, 1, ',', '.')); ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">3</td>
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
                                <?php echo e(number_format($scoreUsia, 1, ',', '.')); ?>

                            </td>
                        </tr>
                        

                    </tbody>
                </table>
                <hr style="margin-top:-1px;" />
            </div>
            <?php if($deviasi): ?>
                <div class="card-body invoice-padding pt-0">
                    <div class="mb-0 mt-1 col-md-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#dokumenDeviasi">Dokumen
                            Deviasi
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            <div class="card-body invoice-padding pt-0">
                <div class="row invoice-spacing">
                    <div class="col-xl-7 p-0">
                        <table>
                            <tbody>
                                <?php
                                    // Compute a fallback total score from any available component scores
                                    if (!isset($total_score)) {
                                        $scoreKeys = ['scoreTenor', 'scoreDsr', 'scoreUsia', 'scoreIdeb', 'scoreSlik', 'scoreIdeb'];
                                        $total = 0;
                                        foreach ($scoreKeys as $k) {
                                            if (isset($$k) && is_numeric($$k)) {
                                                $total += (float) $$k;
                                            }
                                        }
                                        $total_score = $total;
                                    }
                                ?>
                                <tr>
                                    <td class="pe-1">Total Nilai
                                    </td>
                                    <td>:
                                        <?php echo e(number_format($total_score, 1, ',', '.')); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1">Status</td>
                                    <td>:
                                        <?php if($deviasi): ?>
                                            <span class="badge rounded-pill badge-glow bg-success">Diterima
                                                (Deviasi)</span>
                                        <?php elseif($dsr > 90 || ($dsr < 0 || ($tenor > $sisaUsia && $total_score >= 2.5))): ?>
                                            <?php if($dsr > 90 && $total_score >= 2.5): ?>
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                <small class="text-danger">
                                                    *DSR
                                                    > 90%</small>
                                            <?php elseif($dsr < 0 && $total_score >= 2.5): ?>
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            <?php elseif($tenor > $sisaUsia && $total_score >= 2.5): ?>
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            <?php elseif($total_score >= 2 && $total_score <= 2.499): ?>
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            <?php else: ?>
                                                <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($total_score >= 2.5 && $tenor <= $sisaUsia): ?>
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                            <?php elseif($total_score >= 2 && $total_score <= 2.499): ?>
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
                                        <?php if($dsr <= 90): ?>
                                            <small class="text-success">DSR
                                                ≤ 90% </small>
                                        <?php else: ?>
                                            <small class="text-danger">DSR
                                                > 90% </small>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mt-1"></td>
                                    <td>
                                        <?php if($tenor <= $sisaUsia): ?>
                                            <small class="text-success">
                                                &nbsp; Akhir tenor
                                                pembiayaan ≤ 58
                                                tahun
                                            </small>
                                        <?php else: ?>
                                            <small class="text-danger">
                                                &nbsp; Akhir tenor
                                                pembiayaan > 58
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
                                    <td class="pe-1 mb-2">Nilai < 2,0 </td>
                                    <td>: <span class="fw-bold"><span
                                                class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mb-2">Nilai ≥
                                        2,0 - 2,4
                                    </td>
                                    <td>: <span class="fw-bold"><span
                                                class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                Ulang</span></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mb-2">Nilai ≥
                                        2,5 - 4,0
                                    </td>
                                    <td>: <span class="fw-bold"><span
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
<?php /**PATH /Users/ajspryn/Project/fos/Modules/P3k/Resources/views/komite/summary-p3k.blade.php ENDPATH**/ ?>