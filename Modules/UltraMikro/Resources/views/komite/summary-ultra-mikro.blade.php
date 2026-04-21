<!-- Summary Identitas Nasabah -->
<div class="card-body invoice-padding pt-0">
    <div class="row invoice-spacing">
        <div class="col-xl-8 p-0">
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Nomor Aplikasi</td>
                        <td>:
                            {{ strtoupper($pembiayaan->nomor_aplikasi) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Tanggal Pengajuan</td>
                        <td>:
                            {{ strtoupper(strftime('%d %B %Y', strtotime($pembiayaan->tanggal_pengajuan))) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Jenis Pembiayaan</td>
                        <td>:
                            {{ strtoupper($pembiayaan->jenis_pby_ultra_mikro) }}
                        </td>
                    </tr>


                    <tr>
                        <td class="pe-1">Nama AO</td>
                        <td>:
                            {{ strtoupper($pembiayaan->user->name) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Nama Petugas Lap.</td>
                        <td>:
                            {{ strtoupper($pembiayaan->petugasLapangan->nama) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Tanggal Kunjungan</td>
                        <td>:
                            {{ strtoupper(strftime('%d %B %Y', strtotime($pembiayaan->tanggal_kunjungan))) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Tujuan Penggunaan</td>
                        <td>:
                            {{ strtoupper($pembiayaan->tujuan_pembiayaan) }}
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
                        <td class="pe-1">No. Handphone</td>
                        <td>: {{ $pembiayaan->nasabah->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Alamat Domisili</td>
                        <td>:
                            {{ strtoupper($pembiayaan->nasabah->alamat_domisili) }}
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
                            @php
                                //Usia dalam bulan
                                $usiaInMonth = Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir)->age * 12;

                                // Max usia pengajuan 60 Tahun = 720 Bulan
                                $sisaUsia = 720 - $usiaInMonth;

                                $akhirPembiayaan = ($usiaInMonth + $pembiayaan->tenor) / 12;

                            @endphp
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
                            {{ strtoupper($pembiayaan->nasabah->nama_pekerjaan) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Penghasilan </td>
                        <td><span class="fw-bold">: Rp
                                {{ number_format($pembiayaan->penghasilan, 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pengeluaran </td>
                        <td>: Rp
                            {{ number_format($pembiayaan->pengeluaran, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pendapatan Bersih </td>
                        <td>: Rp
                            {{ number_format($pendapatanBersih, 0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- <h6>Sisa Pendapatan Bersih : Rp
                @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                    {{ number_format($pendapatanBersihJoinIncome, 0, ',', '.') }}
                @else
                    {{ number_format($pendapatanBersih, 0, ',', '.') }}
                @endif
            </h6> --}}
            <hr>
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Nominal Pembiayaan</td>
                        <td><span class="fw-bold">: Rp
                                {{ number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    {{-- <tr>
                        <td class="pe-1">
                            @if ($pembiayaan->akad == 'Murabahah')
                                Margin
                            @else
                                Ujrah
                            @endif
                        </td>
                        <td>: Rp
                            {{ number_format($hargaJual - $pembiayaan->nominal_pembiayaan, 0, ',', '.') }}
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
                    </tr> --}}
                    <tr>
                        <td class="pe-1">Jangka Waktu</td>
                        <td>: {{ $tenor }} Bulan</td>
                    </tr>
                    {{-- <tr>
                        <td class="pe-1">Usia Akhir Pembiayaan</td>
                        <td>: @if (is_float($akhirPembiayaan))
                                {{ number_format($akhirPembiayaan, 2, ',', '.') }}
                            @else
                                {{ $akhirPembiayaan }}
                            @endif
                            Tahun
                        </td>
                    </tr> --}}
                    @if ($tenor > $sisaUsia)
                        <tr>
                            <td class="pe-1" colspan="2" style="text-align: center;"><small class="text-danger">*
                                    Tenor
                                    melebihi batas usia maks. 60
                                    tahun!</small></td>
                        </tr>
                    @endif
                    {{-- <tr>
                        <td class="pe-1">Equivalen Rate</td>
                        <td>:
                            {{ number_format($pembiayaan->rate, 2, ',', '.') }}
                            %</td>
                    </tr> --}}
                    <tr>
                        <td class="pe-1">Angsuran</td>
                        <td>: Rp
                            {{ number_format($angsuran, 0, ',', '.') }}/Bulan
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pend. Bersih stl. Angsuran</td>
                        <td>: Rp
                            {{ number_format($pendapatanBersih - $angsuran, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Frekuensi Pembayaran</td>
                        <td>:
                            {{ $pembiayaan->frekuensi_pembayaran }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Angsuran Per Kunjungan</td>
                        <td>: Rp
                            {{ number_format($angsuranPerKunjungan, 0, ',', '.') }}/{{ $minggu }}
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
                    @if ($dsr > 75)
                        <tr>
                            <td class="pe-1" colspan="2" style="text-align: center;"><small class="text-danger">*
                                    DSR melebihi
                                    75%!</small></td>
                        </tr>
                    @endif
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
                            <td> {{ $kategoriRepayment }}
                            </td>
                            <td style="text-align: center">
                                {{ $bobotRepayment * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $ratingRepayment }}</td>
                            <td style="text-align: center">
                                {{ number_format($scoreRepayment, 2, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">2</td>
                            <td>Tempat Tinggal</td>
                            <td> {{ $kategoriStatusTempatTinggal }}
                            </td>
                            <td style="text-align: center">
                                {{ $bobotStatusTempatTinggal * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $ratingStatusTempatTinggal }}</td>
                            <td style="text-align: center">
                                {{ number_format($scoreStatusTempatTinggal, 2, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">3</td>
                            <td>Kolektibilitas Terburuk</td>
                            <td> {{ $kategoriKol }}
                            </td>
                            <td style="text-align: center">
                                {{ $bobotKol * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $ratingKol }}</td>
                            <td style="text-align: center">
                                {{ number_format($scoreKol, 2, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">4</td>
                            <td>Status Kelompok</td>
                            <td> {{ $kategoriStatusKelompok }}
                            </td>
                            <td style="text-align: center">
                                {{ $bobotStatusKelompok * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $ratingStatusKelompok }}</td>
                            <td style="text-align: center">
                                {{ number_format($scoreStatusKelompok, 2, ',', '.') }}
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center">5</td>
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
                                {{ number_format($scoreUsia, 2, ',', '.') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr style="margin-top:-1px;" />
            </div>
            {{-- @if ($deviasi)
                <div class="card-body invoice-padding pt-0">
                    <div class="mb-0 mt-1 col-md-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#dokumenDeviasi">Dokumen
                            Deviasi
                        </button>
                    </div>
                </div>
            @endif --}}

            <div class="card-body invoice-padding pt-0">
                <div class="mb-0 mt-1 col-md-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#suratPermohonanRestruct">Surat Permohonan Restruct
                    </button>
                </div>
            </div>
            @php
                $total_score =
                    $scoreRepayment + $scoreStatusTempatTinggal + $scoreKol + $scoreUsia + $scoreStatusKelompok;
            @endphp

            <div class="card-body invoice-padding pt-0">
                <div class="row invoice-spacing">
                    <div class="col-xl-7 p-0">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="pe-1">Total Nilai
                                    </td>
                                    <td>:
                                        {{ number_format($total_score, 2, ',', '.') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1">Status</td>
                                    <td>:
                                        @if ($dsr > 75 || ($dsr < 0 || ($tenor > $sisaUsia && $total_score >= 3.0)))
                                            @if ($dsr > 75 && $total_score >= 2)
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                <small class="text-danger">
                                                    *DSR
                                                    > 75%</small>
                                            @elseif($dsr < 0 && $total_score >= 2)
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            @elseif($tenor > $sisaUsia && $total_score >= 2)
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            @elseif($total_score >= 1 && $total_score <= 1.99)
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            @else
                                                <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                            @endif
                                        @else
                                            @if ($total_score >= 2 && $tenor <= $sisaUsia)
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                            @elseif($total_score >= 1 && $total_score <= 1.99)
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
                                        @if ($dsr <= 75)
                                            <small class="text-success">DSR
                                                ≤ 75% </small>
                                        @else
                                            <small class="text-danger">DSR
                                                > 75% </small>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pe-1 mt-1"></td>
                                    <td>
                                        @if ($tenor <= $sisaUsia)
                                            <small class="text-success">
                                                &nbsp; Akhir tenor
                                                pembiayaan ≤ 60
                                                tahun
                                            </small>
                                        @else
                                            <small class="text-danger">
                                                &nbsp; Akhir tenor
                                                pembiayaan > 60
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
