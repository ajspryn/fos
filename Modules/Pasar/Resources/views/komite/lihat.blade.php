@extends('pasar::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
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
                                    <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
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
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#legalitas-usaha" role="tab" aria-controls="settings-just"
                                                aria-selected="false">Legalitas Usaha</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#keuangan" role="tab" aria-controls="settings-just"
                                                aria-selected="false">Keuangan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#ideb" role="tab" aria-controls="settings-just"
                                                aria-selected="false">Ideb</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#timeline" role="tab" aria-controls="settings-just"
                                                aria-selected="false">Timeline</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-1">
                                        <div class="tab-pane active" id="proposal" role="tabpanel"
                                            aria-labelledby="home-tab-justified">
                                            <!-- Invoice -->
                                            <div class="col-xl-12 col-md-8 col-12">
                                                <div class="card invoice-preview-card">
                                                    <div class="card-body invoice-padding pb-0">
                                                        <!-- Header starts -->
                                                        <div
                                                            class="d-flex justify-content-center flex-xl-row flex-column invoice-spacing mt-0">
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
                                                                                <td>Jaminan Rumah</td>
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
                                                                                <td>Konfirmasi Kepala Pasar</td>
                                                                                <td></td>
                                                                                <td style="text-align: center">
                                                                                    {{ $kepalapasar->bobot * 100 }}%
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    {{ $rating_kepalapasar }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $score_kepalapasar }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="text-align: center">7</td>
                                                                                <td>Jaminan Kios</td>
                                                                                <td>{{ $jaminans->nama_jaminan }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $jaminans->bobot * 100 }}%
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    {{ $rating_jaminanlain }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $score_jaminanlain }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="text-align: center">8</td>
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
                                                                                <td style="text-align: center">9</td>
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
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="text-align: center">10</td>
                                                                                <td>Suku Bangsa</td>
                                                                                <td value="{{ $sukus->id }}">
                                                                                    {{ $sukus->nama_suku }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $sukus->bobot * 100 }}%
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    {{ $rating_sukubangsa }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $score_sukubangsa }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="text-align: center">11</td>
                                                                                <td>Jenis Pasar</td>
                                                                                <td value="{{ $pasars->id }}">
                                                                                    {{ $pasars->nama_pasar }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $pasars->bobot * 100 }}%
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    {{ $rating_jenispasar }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $score_jenispasar }}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                @php
                                                                    $total_score = $score_idir + $score_slik + $score_cashpick + $score_jaminanrumah + $score_kepalapasar + $score_lamadagang + $score_jenisnasabah + $score_jenisdagang + $score_sukubangsa + $score_jenispasar;
                                                                @endphp
                                                                <div class="card-body invoice-padding pt-0">
                                                                    <div class="row invoice-spacing">
                                                                        <div class="col-xl-8 p-0">
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1">Total Nilai
                                                                                        </td>
                                                                                        <td>: {{ $total_score }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Status</td>
                                                                                        <td>:
                                                                                            @if ($nilai_idir >= 80 || $nilai_idir < 0)
                                                                                                @if ($nilai_idir >= 80)
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                                    <small
                                                                                                        class="text-danger">*IDIR
                                                                                                        > 80%</small>
                                                                                                @elseif($nilai_idir < 0)
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                                    <small
                                                                                                        class="text-danger">*Pengeluaran
                                                                                                        >
                                                                                                        Pendapatan</small>
                                                                                                @endif
                                                                                            @else
                                                                                                @if ($total_score > 3)
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                @elseif($total_score > 2 || $total_score > 3)
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
                                                                        <div class="col-xl-4 p-10 mt-xl-0 mt-2">
                                                                            <p class="mb-1 fw-bold">Note :</p>
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2">Nilai < 2
                                                                                                </td>
                                                                                        <td>: <span class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2">Nilai > 2
                                                                                            - 3
                                                                                        </td>
                                                                                        <td>: <span class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                    Ulang</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2">Nilai > 3
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
                                                                            <td>: {{ $pembiayaan->tgl_pembiayaan }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Penggunaan</td>
                                                                            <td>: {{ $pembiayaan->penggunaan_id }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Sektor</td>
                                                                            <td value="{{ $pembiayaan->sektor->id }}">
                                                                                :
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
                                                                            <td>: {{ $pembiayaan->nasabahh->no_tlp }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Alamat</td>
                                                                            <td>: {{ $pembiayaan->nasabahh->alamat }},
                                                                                {{ $pembiayaan->nasabahh->rt }},
                                                                                {{ $pembiayaan->nasabahh->rw }},
                                                                                {{ $pembiayaan->nasabahh->desa_kelurahan }},
                                                                                {{ $pembiayaan->nasabahh->kecamatan }},
                                                                                {{ $pembiayaan->nasabahh->kabkota }},
                                                                                {{ $pembiayaan->nasabahh->provinsi }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">No KTP</td>
                                                                            <td>: {{ $pembiayaan->nasabahh->no_ktp }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Tempat/Tgl Lahir</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->nasabahh->tmp_lahir }}
                                                                                /
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
                                                                            <td
                                                                                value="{{ $pembiayaan->keteranganusaha->dagang->id }}">
                                                                                :
                                                                                {{ $pembiayaan->keteranganusaha->dagang->nama_jenisdagang }}
                                                                                </option>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Alamat Usaha</td>
                                                                            <td
                                                                                value="{{ $pembiayaan->keteranganusaha->jenispasar->id }}">
                                                                                :
                                                                                Pasar
                                                                                {{ $pembiayaan->keteranganusaha->jenispasar->nama_pasar }}
                                                                                </option>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">No Blok Kios / Los</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->keteranganusaha->no_blok }}
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Kepemilikan Usaha</td>
                                                                            <td
                                                                                value="{{ $pembiayaan->keteranganusaha->id }}">
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
                                                                                    {{ number_format($pembiayaan->omset) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <div class="col-md-3">
                                                                            <tr>
                                                                                <td class="pe-1"> &emsp; HPP</td>
                                                                                <td>: Rp.
                                                                                    {{ number_format($pembiayaan->hpp) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">&emsp; Transport
                                                                                </td>
                                                                                <td>: Rp.
                                                                                    {{ number_format($pembiayaan->trasport) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">&emsp; Telpon</td>
                                                                                <td>: Rp.
                                                                                    {{ number_format($pembiayaan->telpon) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">&emsp; Listrik</td>
                                                                                <td>: Rp.
                                                                                    {{ number_format($pembiayaan->listrik) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">&emsp; Karyawan</td>
                                                                                <td>: Rp.
                                                                                    {{ number_format($pembiayaan->karyawan) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">&emsp; Sewa Kios /
                                                                                    Los
                                                                                </td>
                                                                                <td>: Rp.
                                                                                    {{ number_format($pembiayaan->sewa) }}
                                                                                </td>
                                                                            </tr>
                                                                        </div>
                                                                        {{-- <tr>
                                                        <td class="pe-1">Gaji TPP</td>
                                                        <td>: Rp. {{ number_format($pembiayaan->gaji_tpp) }}</td>
                                                    </tr> --}}
                                                                        <tr>
                                                                            <td class="pe-1 mt-2">Laba Bersih</td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    {{ number_format($pembiayaan->omset - ($pembiayaan->hpp + $pembiayaan->listrik + $pembiayaan->sewa + $pembiayaan->trasport + $pembiayaan->karyawan + $pembiayaan->telpon)) }}</span>
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
                                                                                {{ number_format($angsuran) }}</span>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td class="pe-1">Cicilan Bank Lain</td>
                                                                            <td>: Rp. {{ number_format($cicilan) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Kebutuhan Keluarga</td>
                                                                            <td>: Rp.
                                                                                {{ number_format($pengeluaran_lain) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1 mt-1">Total Pengeluaran
                                                                            </td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    {{ number_format($total_pengeluaran) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <hr>
                                                                <h6>Sisa Pendapatan Bersih : Rp.
                                                                    {{ number_format($laba_bersih - $total_pengeluaran) }}
                                                                </h6>
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
                                                                @foreach ($idebs as $ideb)
                                                                    <tr>
                                                                        <td style="text-align: center">
                                                                            {{ $loop->iteration }}</td>
                                                                        <td>{{ $ideb->nama_bank }}</td>
                                                                        <td>Rp. {{ number_format($ideb->plafond) }}
                                                                        </td>
                                                                        <td>Rp. {{ number_format($ideb->outstanding) }}
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            {{ $ideb->tenor }}
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            {{ number_format($ideb->margin) }}%
                                                                        </td>
                                                                        <td>Rp. {{ number_format($ideb->angsuran) }}
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            {{ $ideb->agunan }}
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            {{ $ideb->kol }}</td>
                                                                    </tr>
                                                                @endforeach


                                                            </tbody>
                                                        </table>
                                                    </div>

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
                                                                                    {{ number_format($pembiayaan->harga) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Harga Jual</td>
                                                                            <td>: Rp. {{ number_format($harga_jual) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Jangka Waktu</td>
                                                                            <td>: {{ $pembiayaan->tenor }} bulan</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Equivalen Rate</td>
                                                                            <td>: {{ $pembiayaan->rate }} %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Angsuran</td>
                                                                            <td>: Rp. {{ number_format($angsuran) }}
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


                                                </div>
                                            </div>
                                            <!-- /Invoice -->

                                            <!-- Invoice Actions -->
                                            <hr class="invoice-spacing" />

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
                                                                        @if ($nilai_idir >= 80 || $nilai_idir < 0)
                                                                            @if ($nilai_idir >= 80)
                                                                                <span
                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                <small class="text-danger">*DSR
                                                                                    >
                                                                                    80%</small>
                                                                            @elseif($nilai_idir < 0)
                                                                                <span
                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                <small class="text-danger">*Pengeluaran
                                                                                    >
                                                                                    Pendapatan</small>
                                                                            @endif
                                                                        @else
                                                                            @if ($total_score > 3)
                                                                                <span
                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                            @elseif($total_score > 2 || $total_score > 3)
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
                                                        @if ($history->status_id == 2)
                                                            @if ($nilai_idir >= 80 || $nilai_idir < 0)
                                                                <div class="card-body">
                                                                    <button class="btn btn-warning w-100 mb-75"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#edit_proposal">
                                                                        Edit Proposal
                                                                    </button>
                                                                </div>
                                                            @else
                                                                @if ($total_score > 3)
                                                                    <div class="card-body">
                                                                        <button class="btn btn-primary w-100 mb-75"
                                                                            data-bs-toggle="modal"data-bs-target="#lanjut_komite">
                                                                            Lanjut Komite
                                                                        </button>
                                                                    </div>
                                                                @elseif ($total_score > 2 || $total_score > 3)
                                                                    <div class="card-body">
                                                                        <button class="btn btn-warning w-100 mb-75"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#edit_proposal">
                                                                            Edit Proposal
                                                                        </button>
                                                                    </div>
                                                                @else
                                                                    <div class="card-body">
                                                                        <button class="btn btn-warning w-100 mb-75"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#edit_proposal">
                                                                            Edit Proposal
                                                                        </button>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endif
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
                                                                method="POST" action="/pasar/komite">
                                                                @csrf

                                                                <div class="col-md-12">
                                                                    <label class="form-label"
                                                                        for="catatan">Catatan</label>
                                                                    <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                </div>
                                                                <input type="hidden" name="pasar_pembiayaan_id"
                                                                    value="{{ $pembiayaan->id }}">
                                                                <input type="hidden" name="status_id" value=3>
                                                                <input type="hidden" name="jabatan_id" value=1>
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ Auth::user()->id }}">

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
                                        </div>

                                        <div class="tab-pane" id="identitas-pribadi" role="tabpanel"
                                            aria-labelledby="profile-tab-justified">
                                            @foreach ($fotos as $foto)
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0">{{ $foto->kategori }}</h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    {{ $foto->created_at->diffForhumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="{{ asset('storage/' . $foto->foto) }}"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            @endforeach
                                        </div>

                                        <div class="tab-pane" id="legalitas-agunan"
                                            role="tabpanel"aria-labelledby="messages-tab-justified">
                                            @foreach ($jaminanusahas as $jaminan)
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0">No KTB :
                                                                    {{ $jaminan->no_ktb }}
                                                                </h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    {{ $jaminan->created_at->diffForhumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="{{ asset('storage/' . $jaminan->dokumenktb) }}"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            @endforeach
                                            @foreach ($jaminanlainusahas as $jaminanlainnya)
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0">
                                                                    {{ $jaminans->nama_jaminan }}
                                                                </h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    {{ $jaminanlainnya->created_at->diffForhumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="{{ asset('storage/' . $jaminanlainnya->dokumen_jaminanlain) }}"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            @endforeach
                                        </div>

                                        <div class="tab-pane" id="ideb" role="tabpanel"
                                            aria-labelledby="settings-tab-justified">
                                            {{-- <iframe src="{{ asset('storage/' . $ideb->foto) }}" frameborder="0"
                                            width="1000" height="900"></iframe> --}}
                                            <embed type="application/pdf" src="{{ asset('storage/' . $ideb->foto) }}"
                                                width="1000" height="900">
                                        </div>
                                        <div class="tab-pane" id="timeline" role="tabpanel"
                                            aria-labelledby="settings-tab-justified">
                                            <div class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                                <div class="card">
                                                    <!-- Timeline Starts -->
                                                    <div class="card-body">
                                                        <ul class="timeline">
                                                            @foreach ($timelines as $timeline)
                                                                <li class="timeline-item">
                                                                    <span
                                                                        class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                                                    <div class="timeline-event">
                                                                        <div
                                                                            class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-0">
                                                                            <h6
                                                                                value="{{ $timeline->statushistory->id }}, {{ $timeline->jabatan->jabatan_id }}">
                                                                                {{ $timeline->statushistory->keterangan }}
                                                                                {{ $timeline->jabatan->keterangan }}
                                                                            </h6>
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
                                                </div>
                                            </div>
                                        </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
