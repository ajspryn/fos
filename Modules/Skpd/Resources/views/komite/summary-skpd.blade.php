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
                        <td class="pe-1">Nama AO</td>
                        <td>:
                            {{ strtoupper($pembiayaan->user->name) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Penggunaan</td>
                        <td>:
                            {{ strtoupper($pembiayaan->jenis_penggunaan->jenis_penggunaan) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Sektor</td>
                        <td>:
                            {{ strtoupper($pembiayaan->sektor->nama_sektor_ekonomi) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Akad</td>
                        <td>:
                            {{ strtoupper($pembiayaan->akad->nama_akad) }}
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
                        <td class="pe-1">No. Telepon</td>
                        <td>: {{ $pembiayaan->nasabah->no_telp }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Alamat</td>
                        <td>:
                            {{ strtoupper($pembiayaan->nasabah->alamat) }}
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
                        <td class="pe-1">Usia</td>
                        <td>:
                            {{ Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir)->age }}
                            TAHUN
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Kantor/Dinas</td>
                        <td>:
                            {{ strtoupper($pembiayaan->instansi->nama_instansi) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Golongan</td>
                        <td>:
                            {{ strtoupper($pembiayaan->golongan->nama_golongan) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Jabatan</td>
                        <td>:
                            {{ strtoupper($pembiayaan->jabatan) }}
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
                                {{ number_format($pembiayaan->gaji_pokok, 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pendapatan Lainnya</td>
                        <td>: Rp.
                            {{ number_format($pembiayaan->pendapatan_lainnya, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Gaji TPP</td>
                        <td>: Rp.
                            {{ number_format($pembiayaan->gaji_tpp, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1 mt-2">Total Pendapatan</td>
                        <td><span class="fw-bold">: Rp.
                                {{ number_format($pembiayaan->pendapatan_lainnya + $pembiayaan->gaji_pokok + $pembiayaan->gaji_tpp, 0, ',', '.') }}</span>
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
                                {{ number_format($cicilan, 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Potongan Lainnya</td>
                        <td>: Rp.
                            {{ number_format($pembiayaan->potongan_lainnya, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Kebutuhan Keluarga</td>
                        <td>: Rp.
                            {{ number_format($biayakeluarga, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1 mt-1">Total Pengeluaran
                        </td>
                        <td><span class="fw-bold">: Rp.
                                {{ number_format($cicilan + $pembiayaan->potongan_lainnya + $biayakeluarga, 0, ',', '.') }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h6>Sisa Pendapatan Bersih : Rp.
                {{ number_format($pendapatan_bersih, 0, ',', '.') }}
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
            @foreach ($ideps as $idep)
                @php
                    // if ($idep) {
                    //     $margin = $idep->margin / 12 / 100;
                    //     $plafond = $idep->plafond * $margin * $idep->tenor + $idep->plafond;
                    //     $angsuran = $plafond / $idep->tenor;
                    // }
                @endphp
                <tr>
                    <td style="text-align: center">
                        {{ $loop->iteration }}</td>
                    <td>{{ $idep->nama_bank }}</td>
                    <td>Rp.
                        {{ number_format($idep->plafond, 0, ',', '.') }}
                    </td>
                    <td>Rp.
                        {{ number_format($idep->outstanding, 0, ',', '.') }}
                    </td>
                    <td style="text-align: center">
                        {{ $idep->tenor }}
                    </td>
                    <td style="text-align: center">
                        {{ number_format($idep->margin, 2, ',', '.') }}%
                    </td>
                    <td>Rp.
                        {{ number_format($idep->angsuran, 0, ',', '.') }}
                    </td>
                    <td style="text-align: center">
                        {{ $idep->agunan }}
                    </td>
                    <td style="text-align: center">
                        {{ $idep->kol_tertinggi }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <hr style="margin-top:-1px;" />
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
                            {{ number_format($ideppasangan->plafond, 0, ',', '.') }}
                        </td>
                        <td>Rp.
                            {{ number_format($ideppasangan->outstanding, 0, ',', '.') }}
                        </td>
                        <td style="text-align: center">
                            {{ $ideppasangan->tenor }}
                        </td>
                        <td style="text-align: center">
                            {{ number_format($ideppasangan->margin, 2, ',', '.') }}%
                        </td>
                        <td>Rp.
                            {{ number_format($ideppasangan->angsuran, 0, ',', '.') }}
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
                                {{ number_format((float) $pembiayaan->nominal_pembiayaan, 0, ',', '.') }}</span>
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
                        <td>: {{ $tenor }}</td>
                    </tr>
                    <tr>
                        <td class="pe-1">Equivalen Rate</td>
                        <td>:
                            {{ number_format($pembiayaan->rate, 2, ',', '.') }}
                            %</td>
                    </tr>
                    <tr>
                        <td class="pe-1">Angsuran</td>
                        <td>: Rp.
                            {{ number_format($angsuran1, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="pe-1">Pendapatan Bersih Stl. Angs.
                        </td>
                        <td>: Rp.
                            {{ number_format($pendapatan_bersih - $angsuran1, 0, ',', '.') }}
                        </td>
                    </tr>
                    @if ($pendapatan_bersih - $angsuran1 < 0)
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
                                {{ $nilai_dsr1 }}
                                %</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--/ Informasi Debitur Nasabah -->

<hr class="invoice-spacing" />
