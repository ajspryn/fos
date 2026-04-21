<!-- Address and Contact starts -->
<div class="card-body invoice-padding pt-0">
    <div class="row invoice-spacing">
        <div class="col-xl-8 p-0">
            <table>
                <tbody>
                    <tr>
                        <td class="pe-1">Tanggal Pengajuan</td>
                        <td>:
                            {{ strtoupper(strftime('%d %B %Y', strtotime($pembiayaan->tgl_pembiayaan))) }}
                        </td>
                                </tr>
                    <tr>
                        <td class="pe-1">Penggunaan</td>
                        <td>: {{ $pembiayaan->penggunaan_id }}</td>
                                </tr>
                    <tr>
                        <td class="pe-1">Sektor</td>
                        <td value="{{ $pembiayaan->sektor->id }}">:
                            {{ $pembiayaan->sektor->nama_sektor_ekonomi }}
                        </td>
                                </tr>
                    <tr>
                        <td class="pe-1">Akad</td>
                        <td value="{{ $pembiayaan->akad->id }}">:
                            {{ $pembiayaan->akad->nama_akad }}
                        </td>
                                </tr>
                    <tr>
                        <td class="pe-1">Nama Nasabah</td>
                        <td><span class="fw-bold">:
                                {{ $pembiayaan->nasabahh->nama_nasabah }}</span>
                        </td>
                                </tr>
                    <tr>
                        <td class="pe-1">No Tlp</td>
                        <td>: {{ $pembiayaan->nasabahh->no_tlp }}</td>
                                </tr>
                    <tr>
                        <td class="pe-1">Alamat</td>
                        <td>: {{ $pembiayaan->nasabahh->alamat }},
                            {{ $pembiayaan->nasabahh->rt }},
                            {{ $pembiayaan->nasabahh->rw }},
                            {{ $pembiayaan->nasabahh->desa_kelurahan }},
                            {{ $pembiayaan->nasabahh->kecamatan }},
                            {{ $pembiayaan->nasabahh->kabkota }},
                            {{ $pembiayaan->nasabahh->provinsi }}</td>
                                </tr>
                    <tr>
                        <td class="pe-1">No KTP</td>
                        <td>: {{ $pembiayaan->nasabahh->no_ktp }}</td>
                                </tr>
                    <tr>
                        <td class="pe-1">Tempat/Tgl Lahir</td>
                        <td>:
                            {{ $pembiayaan->nasabahh->tmp_lahir }} /
                            {{ $pembiayaan->nasabahh->tgl_lahir }}
                        </td>
                                </tr>
                    <tr>
                        <td class="pe-1">Nama Ibu Kandung</td>
                        <td>:
                            {{ $pembiayaan->nasabahh->nama_ibu }}
                        </td>
                                </tr>
                    <tr>
                        <td class="pe-1">Jenis Usaha</td>
                        <td value="{{ $pembiayaan->keteranganusaha->dagang->id }}">
                            :
                            {{ $pembiayaan->keteranganusaha->dagang->nama_jenisdagang }}
                            </option>
                        </td>
                                </tr>
                    <tr>
                        <td class="pe-1">Kepemilikan Usaha</td>
                        <td value="{{ $pembiayaan->keteranganusaha->id }}">
                            :
                            {{ $pembiayaan->keteranganusaha->kep_toko_id }}
                        </td>
                                </tr>
                    {{-- <tr>
    <td class="pe-1">Kantor/Dinas</td>
    <td>: {{ $pembiayaan->->nama_instansi }}</td>
                                </tr> --}}
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
                                {{ number_format((float)($pembiayaan->omset ?? 0), 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    <div class="col-md-3">
                        <tr>
                            <td class="pe-1"> &emsp; HPP</td>
                            <td>: Rp.
                                {{ number_format((float)($pembiayaan->hpp ?? 0), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1">&emsp; Transport</td>
                            <td>: Rp.
                                {{ number_format((float)($pembiayaan->trasport ?? 0), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1">&emsp; Telpon</td>
                            <td>: Rp.
                                {{ number_format((float)($pembiayaan->telpon ?? 0), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1">&emsp; Listrik</td>
                            <td>: Rp.
                                {{ number_format((float)($pembiayaan->listrik ?? 0), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1">&emsp; Karyawan</td>
                            <td>: Rp.
                                {{ number_format((float)($pembiayaan->karyawan ?? 0), 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1">&emsp; Sewa Kios / Los
                            </td>
                            <td>: Rp.
                                {{ number_format((float)($pembiayaan->sewa ?? 0), 0, ',', '.') }}
                            </td>
                        </tr>
                    </div>
                    {{-- <tr>
    <td class="pe-1">Gaji TPP</td>
    <td>: Rp. {{ number_format((float)($pembiayaan->gaji_tpp ?? 0), 0, ',', '.') }}</td>
</tr> --}}
                    <tr>
                        <td class="pe-1 mt-2">Laba Bersih</td>
                        <td><span class="fw-bold">: Rp.
                                {{ number_format($laba_bersih, 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    @if ($pembiayaan->pendapatan_lain > 0)
                        <tr>
                            <td class="pe-1 mt-2">Pendapatan Lain</td>
                            <td><span>: Rp.
                                    {{ number_format((float)($pembiayaan->pendapatan_lain ?? 0), 0, ',', '.') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="pe-1 mt-2">Keterangan Pendapatan
                                Lain</td>
                            <td><span>:
                                    {{ $pembiayaan->ket_pendapatan_lain }}</span>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td class="pe-1 mt-2">Total Pendapatan</td>
                        <td><span class="fw-bold">: Rp.
                                {{ number_format($total_pendapatan_bersih, 0, ',', '.') }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h6 class="mb-1 mt-2">Pengeluaran :</h6>
            <table>
                <tbody>
                    {{-- <tr>
                        <td class="pe-1">Cicilan Bank BTB</td>
                        <td>: Rp.
                            {{ number_format($angsuran, 0, ',', '.') }}</span>
                        </td>
                    </tr> --}}

                    <tr>
                        <td class="pe-1">Cicilan Bank Lain</td>
                        <td>: Rp.
                            {{ number_format($cicilan, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Kebutuhan Keluarga</td>
                        <td>: Rp.
                            {{ number_format($pengeluaran_lain, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1 mt-1">Total Pengeluaran</td>
                        <td><span class="fw-bold">: Rp.
                                {{ number_format($total_pengeluaran, 0, ',', '.') }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h6>Sisa Pendapatan Bersih : Rp.
                {{ number_format($total_pendapatan_bersih - $total_pengeluaran, 0, ',', '.') }}
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
            @foreach ($idebs as $sliknasabah)
                <tr>
                    <td style="text-align: center">
                        {{ $loop->iteration }}</td>
                    <td>{{ $sliknasabah->nama_bank }}</td>
                    <td>Rp.
                        {{ number_format((float)($sliknasabah->plafond ?? 0), 0, ',', '.') }}
                    </td>
                    <td>Rp.
                        {{ number_format((float)($sliknasabah->outstanding ?? 0), 0, ',', '.') }}
                    </td>
                    <td style="text-align: center">i
                        {{ $sliknasabah->tenor }}
                    </td>
                    <td style="text-align: center">
                        {{ number_format((float)($sliknasabah->margin ?? 0)) }}%
                    </td>
                    <td>Rp.
                        {{ number_format((float)($sliknasabah->angsuran ?? 0), 0, ',', '.') }}
                    </td>
                    <td style="text-align: center">
                        {{ $sliknasabah->agunan }}
                    </td>
                    <td style="text-align: center">
                        {{ $sliknasabah->kol_tertinggi }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@if ($cekcicilanpasangan > 0)
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
                @foreach ($ideppasangans as $ideppasangan)
                    @php
                        // if ($ideppasangan) {
                        //     $margin = $ideppasangan->margin / 12 / 100;
                        //     $plafond = $ideppasangan->plafond * $margin * $ideppasangan->tenor + $ideppasangan->plafond;
                        //     $angsuran = $plafond / $ideppasangan->tenor;
                        // }
                    @endphp
                    <tr>
                        <td style="text-align: center">
                            {{ $loop->iteration }}</td>
                        <td>{{ $ideppasangan->nama_bank }}</td>
                        <td>Rp.
                            {{ number_format((float)($ideppasangan->plafond ?? 0), 0, ',', '.') }}
                        </td>
                        <td>Rp.
                            {{ number_format((float)($ideppasangan->outstanding ?? 0), 0, ',', '.') }}
                        </td>
                        <td style="text-align: center">
                            {{ $ideppasangan->tenor }}
                        </td>
                        <td style="text-align: center">
                            {{ number_format((float)($ideppasangan->margin ?? 0)) }}%
                        </td>
                        <td>Rp.
                            {{ number_format((float)($ideppasangan->angsuran ?? 0), 0, ',', '.') }}
                        </td>
                        <td style="text-align: center">
                            {{ $ideppasangan->agunan }}
                        </td>
                        <td style="text-align: center">
                            {{ $ideppasangan->kol_tertinggi }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endif

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
                                {{ number_format((float)($pembiayaan->nominal_pembiayaan ?? 0), 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Harga Jual</td>
                        <td>: Rp.
                            {{ number_format($harga_jual, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Jangka Waktu</td>
                        <td>: {{ $pembiayaan->tenor }} bulan</td>
                    </tr>
                    <tr>
                        <td class="pe-1">Equivalen Rate</td>
                        <td>:
                            {{ number_format((float)($pembiayaan->rate ?? 0), 2, ',', '.') }}
                            %</td>
                    </tr>
                    <tr>
                        <td class="pe-1">Angsuran</td>
                        <td>: Rp.
                            {{ number_format($angsuran, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1 mt-1">IDIR</td>
                        <td><span class="fw-bold">:
                                {{ $nilai_idir }}
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
                                {{ $idir->idir_rendah }}% -
                                {{ $idir->idir_tinggi }}%
                            </td>
                            <td style="text-align: center">
                                {{ $idir->bobot * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $rating_idir }}</td>
                            <td style="text-align: center">
                                {{ $score_idir }}</td>
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
                            <td value="{{ $cashs->id }}">
                                {{ $cashs->nama_jeniscash }}
                            </td>
                            <td style="text-align: center">
                                {{ $cashs->bobot * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $rating_cashpick }}</td>
                            <td style="text-align: center">
                                {{ $score_cashpick }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">3</td>
                            <td>Legalitas Kepemilikkan Rumah</td>
                            <td value="{{ $rumahs->id }}">
                                {{ $rumahs->nama_jaminan }}
                            </td>
                            <td style="text-align: center">
                                {{ $rumahs->bobot * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $rating_jaminanrumah }}</td>
                            <td style="text-align: center">
                                {{ $score_jaminanrumah }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">4</td>
                            <td>Slik</td>
                            <td>{{ $slik->kategori }}
                            </td>
                            <td style="text-align: center">
                                {{ $slik->bobot * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $rating_slik }}</td>
                            <td style="text-align: center">
                                {{ $score_slik }}</td>
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
                            <td value="{{ $nasabahs->id }}">
                                {{ $nasabahs->nama_jenisnasabah }}
                            </td>
                            <td style="text-align: center">
                                {{ $nasabahs->bobot * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $rating_jenisnasabah }}</td>
                            <td style="text-align: center">
                                {{ $score_jenisnasabah }}</td>
                        </tr>

                        <tr>
                            <td style="text-align: center">6</td>
                            <td>Jaminan Kios</td>
                            <td>{{ $jaminans->nama_jaminan }}</td>
                            <td style="text-align: center">
                                {{ $jaminans->bobot * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $rating_jaminanlain }}</td>
                            <td style="text-align: center">
                                {{ $score_jaminanlain }}</td>
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
                            <td value="{{ $lamas->id }}">
                                {{ $lamas->nama_lamaberdagang }}
                            </td>
                            <td style="text-align: center">
                                {{ $lamas->bobot * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $rating_lamadagang }}</td>
                            <td style="text-align: center">
                                {{ $score_lamadagang }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">8</td>
                            <td>Jenis Dagangan</td>
                            <td value="{{ $dagangs->id }}">
                                {{ $dagangs->nama_jenisdagang }}
                            </td>
                            <td style="text-align: center">
                                {{ $dagangs->bobot * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $rating_jenisdagang }}</td>
                            <td style="text-align: center">
                                {{ $score_jenisdagang }}</td>
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
                            <td value="{{ optional($sukus)->id }}">
                                {{ optional($sukus)->nama_suku ?? '-' }}</td>
                            <td style="text-align: center">
                                {{ (optional($sukus)->bobot ?? 0) * 100 }}%
                            </td>
                            <td style="text-align: center">
                                {{ $rating_sukubangsa }}</td>
                            <td style="text-align: center">
                                {{ $score_sukubangsa }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            @php
                $total_score = $score_idir + $score_slik + $score_cashpick + $score_jaminanrumah + $score_lamadagang + $score_jenisnasabah + $score_jenisdagang + $score_sukubangsa;
            @endphp
            <div class="card-body invoice-padding pt-0">
                <div class="row invoice-spacing">
                    <div class="col-xl-8 p-0">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="pe-1"><br>Total Nilai
                                    </td>
                                    <td><br>: {{ $total_score }}</td>
                                </tr>
                                <tr>
                                    <td class="pe-1">Status</td>
                                    <td>:
                                        @if ($nilai_idir >= 80 || $nilai_idir < 0)
                                            @if ($nilai_idir >= 80 && $total_score > 3)
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                <small class="text-danger">*IDIR
                                                    > 80%</small>
                                            @elseif($nilai_idir < 0 && $total_score > 3)
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                <small class="text-danger">*Pengeluaran
                                                    >
                                                    Pendapatan</small>
                                            @elseif($total_score > 2 || $total_score < 3)
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            @else
                                                <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                            @endif
                                        @else
                                            @if ($total_score > 3)
                                                <span class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                            @elseif($total_score > 2 || $total_score > 3)
                                                <span class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                    Ulang</span>
                                            @else
                                                <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                            @endif
                                        @endif
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
