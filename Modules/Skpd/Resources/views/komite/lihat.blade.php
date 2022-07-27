@extends('skpd::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="invoice-preview-wrapper">
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-12 col-md-8 col-12">
                            <div class="card invoice-preview-card">
                                <div class="card-body invoice-padding pb-0">
                                    <!-- Header starts -->
                                    <div class="d-flex justify-content-center flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <h4>Summary</h4>
                                            <hr>
                                            <div class="table-responsive mt-1">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center">No</th>
                                                            <th style="text-align: center">Parameter</th>
                                                            <th style="text-align: center">Kategori</th>
                                                            <th style="text-align: center">Bobot</th>
                                                            <th style="text-align: center">Rating</th>
                                                            <th style="text-align: center">Nilai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align: center">1</td>
                                                            <td>Konfirmasi Bendahara</td>
                                                            <td></td>
                                                            <td style="text-align: center">{{ $bendahara->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_bendahara }}</td>
                                                            <td style="text-align: center">{{ $nilai_bendahara }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">2</td>
                                                            <td>DSR</td>
                                                            <td>{{ $dsr->score_terendah }}% -
                                                                {{ $dsr->score_tertinggi }}%</td>
                                                            <td style="text-align: center">{{ $dsr->bobot * 100 }}%</td>
                                                            <td style="text-align: center">{{ $rating_dsr }}</td>
                                                            <td style="text-align: center">{{ $nilai_dsr }}</td>
                                                        </tr>
                                                        @if ($ideps->count() > 0)
                                                            <tr>
                                                                <td style="text-align: center">3</td>
                                                                <td>Slik</td>
                                                                <td>Kol Tertinggi {{ $slik->kol }}
                                                                </td>
                                                                <td style="text-align: center">{{ $slik->bobot * 100 }}%
                                                                </td>
                                                                <td style="text-align: center">{{ $rating_slik }}</td>
                                                                <td style="text-align: center">{{ $nilai_slik }}</td>
                                                            </tr>
                                                        @else
                                                            @php
                                                                $bobot_ta_slik = 0.2;
                                                                $rating_ta_slik = 4;
                                                                $nilai_slik = $bobot_ta_slik * $rating_ta_slik;
                                                            @endphp
                                                            <tr>
                                                                <td style="text-align: center">3</td>
                                                                <td>Slik</td>
                                                                <td>Tidak Ada Slik
                                                                </td>
                                                                <td style="text-align: center">{{ $bobot_ta_slik * 100 }}%
                                                                </td>
                                                                <td style="text-align: center">{{ $rating_ta_slik }}</td>
                                                                <td style="text-align: center">{{ $nilai_slik }}</td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <td style="text-align: center">4</td>
                                                            <td>Jaminan</td>
                                                            <td>{{ $jaminan->nama_jaminan }}
                                                            </td>
                                                            <td style="text-align: center">{{ $jaminan->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_jaminan }}</td>
                                                            <td style="text-align: center">{{ $nilai_jaminan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">5</td>
                                                            <td>Jenis Nasabah</td>
                                                            <td>{{ $nasabah }}</td>
                                                            <td style="text-align: center">{{ 0.1 * 100 }}%</td>
                                                            <td style="text-align: center">{{ $rating_nasabah }}</td>
                                                            <td style="text-align: center">{{ $nilai_nasabah }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">6</td>
                                                            <td>Instansi</td>
                                                            <td>{{ $instansi->nama_instansi }}
                                                            </td>
                                                            <td style="text-align: center">{{ $instansi->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_instansi }}</td>
                                                            <td style="text-align: center">{{ $nilai_instansi }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            @php
                                                $total_score = $nilai_bendahara + $nilai_dsr + $nilai_slik + $nilai_jaminan + $nilai_nasabah + $nilai_instansi;
                                            @endphp
                                            <div class="card-body invoice-padding pt-0">
                                                <div class="row invoice-spacing">
                                                    <div class="col-xl-7 p-0">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="pe-1">Total Nilai</td>
                                                                    <td>: {{ $total_score }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">Status</td>
                                                                    <td>:
                                                                        @if ($nilai_dsr1 >= 40 || $nilai_dsr1 < 0)
                                                                            @if ($nilai_dsr1 >= 40)
                                                                                <span
                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                <small class="text-danger">*DSR >
                                                                                    40%</small>
                                                                            @elseif ($nilai_dsr1 < 0)
                                                                                <span
                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                <small class="text-danger">*Pengeluaran >
                                                                                    Pendapatan</small>
                                                                            @endif
                                                                        @else
                                                                            @if ($total_score > 3)
                                                                                <span
                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                            @elseif ($total_score > 2 || $total_score > 3)
                                                                                <span
                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                    Ulang</span>
                                                                            @else
                                                                                <span
                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                            @endif
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
                                                                    <td class="pe-1 mb-2">Nilai < 2 </td>
                                                                    <td>: <span class="fw-bold"><span
                                                                                class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1 mb-2">Nilai > 2 - 3 </td>
                                                                    <td>: <span class="fw-bold"><span
                                                                                class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                Ulang</span></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1 mb-2">Nilai > 3 </td>
                                                                    <td>: <span class="fw-bold"><span
                                                                                class="badge rounded-pill badge-glow bg-success">Diterima</span></span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <p class="card-text mb-25 mt-2"></p> --}}
                                            {{-- <h5 class="card-text mb-1">Total Nilai : {{ $total_score }}</h5>
                                            <h5 class="card-text mb-0">Status :
                                                @if ($nilai_dsr1 >= 40)
                                                    <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                    <p>*Nilai DSR Diatas 40%</p>
                                                @else
                                                    @if ($total_score > 3)
                                                        <span
                                                            class="badge rounded-pill badge-glow bg-success">Approve</span>
                                                    @elseif ($total_score > 2 || $total_score > 3)
                                                        <span class="badge rounded-pill badge-glow bg-warning">Review
                                                            Ulang</span>
                                                    @else
                                                        <span class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                    @endif
                                                @endif
                                            </h5> --}}
                                            <!-- Invoice Note starts -->
                                            {{-- <div class="card-body invoice-padding pt-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span class="fw-bold">Note:</span>
                                                        <p class="card-text mb-0 mt-1">Nilai Kurang Dari 2 = <span
                                                                class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                        </p>
                                                        <p class="card-text mb-0 mt-1">Nilai > 2 Sampai Dengan 3 = <span
                                                                class="badge rounded-pill badge-glow bg-warning">Review
                                                                Ulang</span>
                                                        </p>
                                                        <p class="card-text mb-0 mt-1">Nilai Lebih Besar Dari 3 = <span
                                                                class="badge rounded-pill badge-glow bg-warning">Approve</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <!-- Invoice Note ends -->
                                        </div>
                                    </div>
                                    <!-- Header ends -->
                                </div>

                                <hr class="invoice-spacing" />

                                <!-- Address and Contact starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        <div class="col-xl-8 p-0">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pe-1">Tanggal Pengajuan</td>
                                                        <td>: {{ $pembiayaan->tanggal_pengajuan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Penggunaan</td>
                                                        <td>: {{ $pembiayaan->jenis_penggunaan->jenis_penggunaan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Sektor</td>
                                                        <td>: {{ $pembiayaan->sektor->nama_sektor_ekonomi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Akad</td>
                                                        <td>: {{ $pembiayaan->akad->nama_akad }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Nama Nasabah</td>
                                                        <td><span class="fw-bold">:
                                                                {{ $pembiayaan->nasabah->nama_nasabah }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">No Tlp</td>
                                                        <td>: {{ $pembiayaan->nasabah->no_telp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Alamat</td>
                                                        <td>: {{ $pembiayaan->nasabah->alamat }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">No KTP</td>
                                                        <td>: {{ $pembiayaan->nasabah->no_ktp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Tempat/Tgl Lahir</td>
                                                        <td>:
                                                            {{ $pembiayaan->nasabah->tempat_lahir }}/{{ $pembiayaan->nasabah->tgl_lahir }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Kantor/Dinas</td>
                                                        <td>: {{ $pembiayaan->instansi->nama_instansi }}</td>
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
                                                                {{ number_format($pembiayaan->gaji_pokok) }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Pendapatan Lainnya</td>
                                                        <td>: Rp. {{ number_format($pembiayaan->pendapatan_lainnya) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Gaji TPP</td>
                                                        <td>: Rp. {{ number_format($pembiayaan->gaji_tpp) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1 mt-2">Total Pendapatan</td>
                                                        <td><span class="fw-bold">: Rp.
                                                                {{ number_format($pembiayaan->pendapatan_lainnya + $pembiayaan->gaji_pokok + $pembiayaan->gaji_tpp) }}</span>
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
                                                                {{ number_format($cicilan) }}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Potongan Lainnya</td>
                                                        <td>: Rp. {{ number_format($pembiayaan->potongan_lainnya) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Kebutuhan Keluarga</td>
                                                        <td>: Rp. {{ number_format($biayakeluarga) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1 mt-1">Total Pengeluaran</td>
                                                        <td><span class="fw-bold">: Rp.
                                                                {{ number_format($cicilan + $pembiayaan->potongan_lainnya + $biayakeluarga) }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                            <h6>Sisa Pendapatan Bersih : Rp. {{ number_format($pendapatan_bersih) }}</h6>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address and Contact ends -->

                                <!-- Invoice Description starts -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; width: 5%;" class="py-1">No</th>
                                                <th style="text-align: center" class="py-1">Nama Bank</th>
                                                <th style="text-align: center" class="py-1">Plafond</th>
                                                <th style="text-align: center" class="py-1">Outstanding</th>
                                                <th style="text-align: center" class="py-1">Tenor</th>
                                                <th style="text-align: center" class="py-1">Margin</th>
                                                <th style="text-align: center" class="py-1">Angsuran</th>
                                                <th style="text-align: center" class="py-1">Agunan</th>
                                                <th style="text-align: center" class="py-1">Kol Tertinggi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ideps as $idep)
                                                @php
                                                    if ($idep) {
                                                        $margin = $idep->margin / 12 / 100;
                                                        $plafond = $idep->plafond * $margin * $idep->tenor + $idep->plafond;
                                                        $angsuran = $plafond / $idep->tenor;
                                                    }
                                                @endphp
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td>{{ $idep->nama_bank }}</td>
                                                    <td>Rp. {{ number_format($idep->plafond) }}</td>
                                                    <td>Rp. {{ number_format($idep->outstanding) }}</td>
                                                    <td style="text-align: center">{{ $idep->tenor }}</td>
                                                    <td style="text-align: center">{{ number_format($idep->margin) }}%
                                                    </td>
                                                    <td>Rp. {{ number_format($idep->angsuran) }}</td>
                                                    <td style="text-align: center">{{ $idep->agunan }}</td>
                                                    <td style="text-align: center">{{ $idep->kol_tertinggi }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

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
                                                                {{ number_format($pembiayaan->nominal_pembiayaan) }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Harga Jual</td>
                                                        <td>: Rp. {{ number_format($harga_jual) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Jangka Waktu</td>
                                                        <td>: {{ $tenor }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Equivalen Rate</td>
                                                        <td>: {{ $pembiayaan->rate }} %</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Angsuran</td>
                                                        <td>: Rp. {{ number_format($angsuran1) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1 mt-1">DSR</td>
                                                        <td><span class="fw-bold">: {{ $nilai_dsr1 }}
                                                                %</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Description ends -->

                                <hr class="invoice-spacing" />

                                <!-- Invoice Note starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        <div class="col-xl-7 p-0">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pe-1">Total Nilai</td>
                                                        <td>: {{ $total_score }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Status</td>
                                                        <td>:
                                                            @if ($nilai_dsr1 >= 40 || $nilai_dsr1 < 0)
                                                                @if ($nilai_dsr1 >= 40)
                                                                    <span
                                                                        class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                    <small class="text-danger">*DSR > 40%</small>
                                                                @elseif ($nilai_dsr1 < 0)
                                                                    <span
                                                                        class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                    <small class="text-danger">*Pengeluaran >
                                                                        Pendapatan</small>
                                                                @endif
                                                            @else
                                                                @if ($total_score > 3)
                                                                    <span
                                                                        class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                @elseif ($total_score > 2 || $total_score > 3)
                                                                    <span
                                                                        class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                        Ulang</span>
                                                                @else
                                                                    <span
                                                                        class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                @endif
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
                                                        <td class="pe-1 mb-1">Nilai < 2 </td>
                                                        <td>: <span class="fw-bold"><span
                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1 mb-1">Nilai > 2 - 3 </td>
                                                        <td>: <span class="fw-bold"><span
                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                    Ulang</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1 mb-1">Nilai > 3 </td>
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
                        <!-- /Invoice -->

                        <!-- Invoice Actions -->
                        <div class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                @if ($nilai_dsr1 >= 40 || $nilai_dsr1 < 0)
                                @else
                                    <div class="card-body">
                                        <button class="btn btn-primary w-100 mb-75" data-bs-toggle="modal"
                                            data-bs-target="#send-invoice-sidebar">
                                            Lanjut Komite
                                        </button>
                                    </div>
                                @endif
                                <!-- Timeline Starts -->
                                <div class="card-header">
                                    <h4 class="card-title">Timeline</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="timeline">
                                        @foreach ($timelines as $timeline)
                                            <li class="timeline-item">
                                                <span
                                                    class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                                <div class="timeline-event">
                                                    <div
                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-0">
                                                        <h6>{{ $timeline->status }}</h6>
                                                    </div>
                                                    <span
                                                        class="timeline-event-time">{{ $timeline->created_at->diffForHumans() }}</span>
                                                    {{-- <p>{{ $timeline->created_at->diffForHumans() }}</p> --}}
                                                    <div class="d-flex flex-row align-items-center">

                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Timeline Ends -->

                            </div>
                        </div>
                        <!-- /Invoice Actions -->
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
