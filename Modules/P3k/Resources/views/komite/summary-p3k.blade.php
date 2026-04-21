<!-- Summary Identitas Nasabah -->
<div class="card-body invoice-padding pt-0">
    <div class="row invoice-spacing">
        <div class="col-xl-8 p-0">
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Tanggal Pengajuan</td>
                        <td>:
                            {{ strtoupper(strftime('%d %B %Y', strtotime($pembiayaan->tanggal_pengajuan))) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pengajuan Fas. Aktif Ke-</td>
                        <td>:
                            {{ $pembiayaan->pengajuan_fas_aktif_ke }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Nama AO</td>
                        <td>:
                            {{ strtoupper($pembiayaan->user->name) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Tujuan Penggunaan</td>
                        <td>:
                            {{ strtoupper($pembiayaan->jenis_penggunaan) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Akad</td>
                        <td>:
                            {{ strtoupper($pembiayaan->akad) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Nama Nasabah</td>
                        <td><span class="fw-bold">:
                                {{ strtoupper($pembiayaan->nasabah->nama_nasabah) }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">No. KTP</td>
                        <td>: {{ $pembiayaan->nasabah->no_ktp }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Jenis Kelamin</td>
                        <td>:
                            {{ strtoupper($pembiayaan->nasabah->jenis_kelamin) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Agama</td>
                        <td>:
                            {{ strtoupper($pembiayaan->nasabah->agama) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Tinggi Badan</td>
                        <td>: {{ $pembiayaan->nasabah->tinggi_badan }}
                            cm
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Berat Badan</td>
                        <td>: {{ $pembiayaan->nasabah->berat_badan }} kg
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">No. Telepon</td>
                        <td>: {{ $pembiayaan->nasabah->no_telp }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">No. Handphone</td>
                        <td>: {{ $pembiayaan->nasabah->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Alamat Domisili</td>
                        <td>:
                            {{ strtoupper($pembiayaan->nasabah->alamat_domisili) }},
                            RT
                            {{ $pembiayaan->nasabah->rt_domisili }}/RW
                            {{ $pembiayaan->nasabah->rw_domisili }},
                            {{ strtoupper($pembiayaan->nasabah->desa_kelurahan_domisili) }},
                            {{ strtoupper($pembiayaan->nasabah->kabkota_domisili) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Tempat, Tanggal Lahir</td>
                        <td>:
                            {{ strtoupper($pembiayaan->nasabah->tempat_lahir) }},
                            {{ strtoupper(strftime('%d %B %Y', strtotime($pembiayaan->nasabah->tgl_lahir))) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Usia Ketika Pengajuan</td>
                        <td>:
                            {{ Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir)->age }}
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
                            {{ strtoupper(optional($pembiayaan->nasabah->pekerjaan)->dinas ?? '-') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Unit Kerja</td>
                        <td>:
                            {{ strtoupper(optional($pembiayaan->nasabah->pekerjaan)->nama_unit_kerja ?? '-') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Jabatan</td>
                        <td>:
                            {{ strtoupper(optional($pembiayaan->nasabah->pekerjaan)->jabatan ?? '-') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">No. SK</td>
                        <td>:
                            {{ optional($pembiayaan->nasabah->pekerjaan)->no_sk ?? '-' }}
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
                                {{ number_format((float)str_replace('.', '', $pembiayaan->gaji_pokok ?? '0'), 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Gaji TPP</td>
                        <td>: Rp
                            {{ number_format((float)str_replace('.', '', $pembiayaan->gaji_tpp ?? '0'), 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1 mt-2">Total Pendapatan</td>
                        <td><span class="fw-bold">: Rp
                                {{ number_format((float)str_replace('.', '', $pembiayaan->gaji_pokok ?? '0') + (float)str_replace('.', '', $pembiayaan->gaji_tpp ?? '0'), 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                        <tr>
                            <td class="pe-1">Gaji Pasangan</td>
                            <td>: Rp
                                {{ number_format((float)str_replace('.', '', $pembiayaan->gaji_pasangan ?? '0'), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1 mt-2">Total Pendapatan Join
                                Income</td>
                            <td><span class="fw-bold">: Rp
                                    {{ number_format((float)str_replace('.', '', $pembiayaan->gaji_pokok ?? '0') + (float)str_replace('.', '', $pembiayaan->gaji_tpp ?? '0') + (float)str_replace('.', '', $pembiayaan->gaji_pasangan ?? '0'), 0, ',', '.') }}</span>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <hr>
            <h6 class="mb-1 mt-2">Pengeluaran :</h6>
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Angsuran BTB (Fas. Aktif)</td>
                        <td>: Rp
                            {{ number_format((float)str_replace('.', '', $pembiayaan->total_angsuran_btb_fas_aktif ?? '0'), 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pengeluaran Lainnya</td>
                        <td>: Rp
                            {{ number_format((float)str_replace('.', '', $pembiayaan->pengeluaran_lainnya ?? '0'), 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Total Pengeluaran</td>
                        <td><span class="fw-bold">: Rp
                                {{ number_format((float)str_replace('.', '', $pembiayaan->total_angsuran_btb_fas_aktif ?? '0') + (float)str_replace('.', '', $pembiayaan->pengeluaran_lainnya ?? '0'), 0, ',', '.') }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            @php
                if (!isset($pendapatanBersih)) {
                    $pendapatanBersih = (float)str_replace('.', '', $pembiayaan->gaji_pokok ?? '0') + (float)str_replace('.', '', $pembiayaan->gaji_tpp ?? '0') - ((float)str_replace('.', '', $pembiayaan->total_angsuran_btb_fas_aktif ?? '0') + (float)str_replace('.', '', $pembiayaan->pengeluaran_lainnya ?? '0'));
                }
                if (!isset($pendapatanBersihJoinIncome)) {
                    $pendapatanBersihJoinIncome = $pendapatanBersih + (float)str_replace('.', '', $pembiayaan->gaji_pasangan ?? '0');
                }
            @endphp

            <h6>Sisa Pendapatan Bersih : Rp
                @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                    {{ number_format($pendapatanBersihJoinIncome, 0, ',', '.') }}
                @else
                    {{ number_format($pendapatanBersih, 0, ',', '.') }}
                @endif
            </h6>
            <hr>
        </div>
    </div>
</div>
<!--/ Summary Identitas Nasabah -->

{{-- <!-- Informasi Debitur Nasabah -->
<div class="table-responsive">
    <h4>Informasi Debitur Nasabah</h4>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align: center;  vertical-align:middle;; width: 5%;"
                    class="py-1">No</th>
                <th style="text-align: center;  vertical-align:middle;"
                    class="py-1">Nama
                    Bank</th>
                <th style="text-align: center;  vertical-align:middle;"
                    class="py-1">
                    Plafond
                </th>
                <th style="text-align: center;  vertical-align:middle;"
                    class="py-1">
                    Outstanding</th>
                <th style="text-align: center;  vertical-align:middle;"
                    class="py-1">
                    Tenor
                </th>
                <th style="text-align: center;  vertical-align:middle;"
                    class="py-1">
                    Margin
                </th>
                <th style="text-align: center;  vertical-align:middle;"
                    class="py-1">
                    Angsuran
                </th>
                <th style="text-align: center;  vertical-align:middle;"
                    class="py-1">
                    Agunan
                </th>
                <th style="text-align: center;  vertical-align:middle;"
                    class="py-1">Kol
                    Tertinggi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($idebs as $ideb)
                <tr>
                    <td style="text-align: center">
                        {{ $loop->iteration }}</td>
                    <td>{{ $ideb->nama_bank }}</td>
                    <td>Rp. {{ number_format((float)($ideb->plafond ?? 0)) }}
                    </td>
                    <td>Rp.
                        {{ number_format((float)($ideb->outstanding ?? 0)) }}
                    </td>
                    <td style="text-align: center">
                        {{ $ideb->tenor }}
                    </td>
                    <td style="text-align: center">
                        {{ number_format((float)($ideb->margin ?? 0)) }}%
                    </td>
                    <td>Rp. {{ number_format((float)($ideb->angsuran ?? 0)) }}
                    </td>
                    <td style="text-align: center">
                        {{ $ideb->agunan }}
                    </td>
                    <td style="text-align: center">
                        {{ $ideb->kol_tertinggi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr style="margin-top:-1px;" />
</div>

@if ($idebPasangans)
    <br />
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
                @foreach ($idebPasangans as $idebPasangan)
                    <tr>
                        <td style="text-align: center">
                            {{ $loop->iteration }}</td>
                        <td>{{ $idebPasangan->nama_bank }}</td>
                        <td>Rp.
                            {{ number_format((float)($idebPasangan->plafond ?? 0)) }}
                        </td>
                        <td>Rp.
                            {{ number_format((float)($idebPasangan->outstanding ?? 0)) }}
                        </td>
                        <td style="text-align: center">
                            {{ $idebPasangan->tenor }}
                        </td>
                        <td style="text-align: center">
                            {{ number_format((float)($idebPasangan->margin ?? 0)) }}%
                        </td>
                        <td>Rp.
                            {{ number_format((float)($idebPasangan->angsuran ?? 0)) }}
                        </td>
                        <td style="text-align: center">
                            {{ $idebPasangan->agunan }}
                        </td>
                        <td style="text-align: center">
                            {{ $idebPasangan->kol_tertinggi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif --}}

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
                    @php
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
                    @endphp
                    @php
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
                    @endphp
                    @php
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
                    @endphp
                    <tr>
                        <td class="pe-1">Harga Beli</td>
                        <td><span class="fw-bold">: Rp
                                {{ number_format((float)str_replace('.', '', $pembiayaan->nominal_pembiayaan ?? '0'), 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">
                            @if ($pembiayaan->akad == 'Murabahah')
                                Margin
                            @else
                                Ujrah
                            @endif
                        </td>
                        <td>: Rp
                            {{ number_format($hargaJual - (float)str_replace('.', '', $pembiayaan->nominal_pembiayaan ?? '0'), 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Harga Jual</td>
                        <td>: Rp
                            {{ number_format($hargaJual, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Biaya Administrasi</td>
                        <td>: Rp
                            {{ number_format($byAdm, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Jangka Waktu</td>
                        <td>: {{ $tenor }} Bulan</td>
                    </tr>
                    <tr>
                        <td class="pe-1">Usia Akhir Pembiayaan</td>
                        <td>: @if (is_float($akhirPembiayaan))
                                {{ number_format($akhirPembiayaan, 1, ',', '.') }}
                            @else
                                {{ $akhirPembiayaan }}
                            @endif
                            Tahun
                        </td>
                    </tr>
                    @if ($tenor > $sisaUsia)
                        <tr>
                            <td class="pe-1" colspan="2" style="text-align: center;"><small class="text-danger">*
                                    Tenor
                                    melebihi batas usia maks. 58
                                    tahun!</small></td>
                        </tr>
                    @endif
                    @php
                        if (!isset($angsuran)) {
                            $months = $tenor ?? ($pembiayaan->tenor ?? 1);
                            $principal = $hargaJual ?? ($pembiayaan->nominal_pembiayaan ?? 0);
                            $adm = $byAdm ?? ($pembiayaan->biaya_adm ?? 0);
                            $angsuran = 0;
                            if ($months > 0) {
                                $angsuran = (int) round(($principal + $adm) / $months);
                            }
                        }
                    @endphp
                    <tr>
                        <td class="pe-1">Equivalen Rate</td>
                        <td>:
                            {{ number_format((float)($pembiayaan->rate ?? 0), 2, ',', '.') }}
                            %</td>
                    </tr>
                    <tr>
                        <td class="pe-1">Angsuran</td>
                        <td>: Rp
                            {{ number_format($angsuran, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pend. Bersih stl. Angsuran</td>
                        <td>: Rp
                            @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                {{ number_format($pendapatanBersihJoinIncome - $angsuran, 0, ',', '.') }}
                            @else
                                {{ number_format($pendapatanBersih - $angsuran, 0, ',', '.') }}
                            @endif
                        </td>
                    </tr>
                    @if ($pendapatanBersih - $angsuran < 0)
                        <tr>
                            <td class="pe-1" colspan="2" style="text-align: center;"><small class="text-danger">*
                                    Pendapatan
                                    bersih
                                    tidak mencukupi!</small></td>
                        </tr>
                    @endif
                    <tr>
                        <td class="pe-1 mt-1">DSR</td>
                        <td><span class="fw-bold">:
                                {{ $dsr }}
                                %</span></td>
                    </tr>
                    @if ($dsr > 90)
                        <tr>
                            <td class="pe-1" colspan="2" style="text-align: center;"><small class="text-danger">*
                                    DSR melebihi
                                    90%!</small></td>
                        </tr>
                    @endif
                    @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                        <tr>
                            <td class="pe-1 mt-1">DSR Join Income</td>
                            <td><span class="fw-bold">:
                                    {{ $dsrJoinIncome }}
                                    %</span></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--/ Summary Harga -->

<hr class="invoice-spacing" />

<!-- Summary Score -->
@php
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
@endphp
@php
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
@endphp
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
                            <td> {{ $prosesTenor->tenor_min }}
                                -
                                {{ $prosesTenor->tenor_maks }} Bulan
                            </td>
                            <td style="text-align: center">
                                {{ $bobotTenor * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $ratingTenor }}</td>
                            <td style="text-align: center">
                                {{ number_format($scoreTenor, 1, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">2</td>
                            <td>DSR</td>
                            <td>
                                @if ($prosesDsr->id == 5)
                                    {{ '> 90%' }}
                                @else
                                    {{ $prosesDsr->nilai_min }}%
                                    -
                                    {{ $prosesDsr->nilai_maks }}%
                                @endif
                            </td>
                            <td style="text-align: center">
                                {{ $bobotDsr * 100 }}%</td>
                            <td style="text-align: center">
                                {{ $ratingDsr }}</td>
                            <td style="text-align: center">
                                {{ number_format($scoreDsr, 1, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">3</td>
                            <td>Usia</td>
                            <td>{{ $prosesUsia->usia_min }}
                                -
                                {{ $prosesUsia->usia_maks }}
                                Tahun
                            </td>
                            <td style="text-align: center">
                                {{ $bobotUsia * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $ratingUsia }}</td>
                            <td style="text-align: center">
                                {{ number_format($scoreUsia, 1, ',', '.') }}
                            </td>
                        </tr>
                        {{-- <tr>
                            <td style="text-align: center">4
                            </td>
                            <td>Slik</td>
                            @if ($idebs->count() > 0)
                                <td>Kol Tertinggi
                                    {{ $prosesIdeb->kol_tertinggi }}
                                </td>
                            @else
                                <td>Tidak Ada Slik
                                </td>
                            @endif
                            <td style="text-align: center">
                                {{ $bobotIdeb * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $ratingIdeb }}</td>
                            <td style="text-align: center">
                                {{ $scoreIdeb }}</td>
                        </tr> --}}

                    </tbody>
                </table>
                <hr style="margin-top:-1px;" />
            </div>
            @if ($deviasi)
                <div class="card-body invoice-padding pt-0">
                    <div class="mb-0 mt-1 col-md-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#dokumenDeviasi">Dokumen
                            Deviasi
                        </button>
                    </div>
                </div>
            @endif
            <div class="card-body invoice-padding pt-0">
                <div class="row invoice-spacing">
                    <div class="col-xl-7 p-0">
                        <table>
                            <tbody>
                                @php
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
                                @endphp
                                <tr>
                                    <td class="pe-1">Total Nilai
                                    </td>
                                    <td>:
                                        {{ number_format($total_score, 1, ',', '.') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1">Status</td>
                                    <td>:
                                        @if ($deviasi)
                                            <span class="badge rounded-pill badge-glow bg-success">Diterima
                                                (Deviasi)</span>
                                        @elseif($dsr > 90 || ($dsr < 0 || ($tenor > $sisaUsia && $total_score >= 2.5)))
                                            @if ($dsr > 90 && $total_score >= 2.5)
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                <small class="text-danger">
                                                    *DSR
                                                    > 90%</small>
                                            @elseif($dsr < 0 && $total_score >= 2.5)
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            @elseif($tenor > $sisaUsia && $total_score >= 2.5)
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            @elseif($total_score >= 2 && $total_score <= 2.499)
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            @else
                                                <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                            @endif
                                        @else
                                            @if ($total_score >= 2.5 && $tenor <= $sisaUsia)
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                            @elseif($total_score >= 2 && $total_score <= 2.499)
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            @else
                                                <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                            @endif
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mt-1">Keterangan
                                    </td>
                                    <td>:
                                        @if ($dsr <= 90)
                                            <small class="text-success">DSR
                                                ≤ 90% </small>
                                        @else
                                            <small class="text-danger">DSR
                                                > 90% </small>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mt-1"></td>
                                    <td>
                                        @if ($tenor <= $sisaUsia)
                                            <small class="text-success">
                                                &nbsp; Akhir tenor
                                                pembiayaan ≤ 58
                                                tahun
                                            </small>
                                        @else
                                            <small class="text-danger">
                                                &nbsp; Akhir tenor
                                                pembiayaan > 58
                                                tahun
                                            </small>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mt-1"></td>
                                    <td>
                                        @if ($pendapatanBersih - $angsuran < 0)
                                            <small class="text-danger">
                                                &nbsp; Pendapatan < Pengeluaran </small>
                                                @else
                                                    <small class="text-success">
                                                        &nbsp;
                                                        Pendapatan >
                                                        Pengeluaran
                                                    </small>
                                        @endif

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
