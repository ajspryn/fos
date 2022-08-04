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
                <section class="invoice-preview-wrapper">
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-12 col-md-8 col-12">
                            <div class="card invoice-preview-card">
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
                                                            <td>IDIR</td>
                                                            <td>
                                                                {{ $idir->idir_rendah }}% - {{ $idir->idir_tinggi }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $idir->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center"> {{ $rating_idir }}</td>
                                                            <td style="text-align: center">{{ $score_idir }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">2</td>
                                                            <td>Cash Pick Up</td>
                                                            <td value="{{ $cashs->id }}">{{ $cashs->nama_jeniscash }}
                                                            </td>
                                                            <td style="text-align: center">{{ $cashs->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_cashpick }}</td>
                                                            <td style="text-align: center">{{ $score_cashpick }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">3</td>
                                                            <td>Jaminan Rumah</td>
                                                            <td value="{{ $rumahs->id }}">{{ $rumahs->nama_jaminan }}
                                                            </td>
                                                            <td style="text-align: center">{{ $rumahs->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_jaminanrumah }}</td>
                                                            <td style="text-align: center">{{ $score_jaminanrumah }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">4</td>
                                                            <td>Slik</td>
                                                            <td>{{ $slik->kategori }}
                                                            </td>
                                                            <td style="text-align: center">{{ $slik->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center"> {{ $rating_slik }}</td>
                                                            <td style="text-align: center">{{ $score_slik }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td style="text-align: center">5</td>
                                                            <td>Jenis Nasabah</td>
                                                            <td value="{{ $nasabahs->id }}">
                                                                {{ $nasabahs->nama_jenisnasabah }}</td>
                                                            <td style="text-align: center">{{ $nasabahs->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_jenisnasabah }}</td>
                                                            <td style="text-align: center">{{ $score_jenisnasabah }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">6</td>
                                                            <td>Konfirmasi Kepala Pasar</td>
                                                            <td>{{ $kepalapasar->kategori }}</td>
                                                            <td style="text-align: center">{{ $kepalapasar->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_kepalapasar }}</td>
                                                            <td style="text-align: center">{{ $score_kepalapasar }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">7</td>
                                                            <td>Jaminan Kios</td>
                                                            <td>{{ $jaminans->nama_jaminan }}</td>
                                                            <td style="text-align: center">{{ $jaminans->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_jaminanlain }}</td>
                                                            <td style="text-align: center">{{ $score_jaminanlain }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">8</td>
                                                            <td>Lama Berdagang</td>
                                                            <td value="{{ $lamas->id }}">
                                                                {{ $lamas->nama_lamaberdagang }}</td>
                                                            <td style="text-align: center">{{ $lamas->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_lamadagang }}</td>
                                                            <td style="text-align: center">{{ $score_lamadagang }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">9</td>
                                                            <td>Jenis Dagangan</td>
                                                            <td value="{{ $dagangs->id }}">
                                                                {{ $dagangs->nama_jenisdagang }}</td>
                                                            <td style="text-align: center">{{ $dagangs->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_jenisdagang }}</td>
                                                            <td style="text-align: center">{{ $score_jenisdagang }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">10</td>
                                                            <td>Suku Bangsa</td>
                                                            <td value="{{ $sukus->id }}">{{ $sukus->nama_suku }}</td>
                                                            <td style="text-align: center">{{ $sukus->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_sukubangsa }}</td>
                                                            <td style="text-align: center">{{ $score_sukubangsa }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center">11</td>
                                                            <td>Jenis Pasar</td>
                                                            <td value="{{ $pasars->id }}">{{ $pasars->nama_pasar }}</td>
                                                            <td style="text-align: center">{{ $pasars->bobot * 100 }}%
                                                            </td>
                                                            <td style="text-align: center">{{ $rating_jenispasar }}</td>
                                                            <td style="text-align: center">{{ $score_jenispasar }}</td>
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
                                                                    <td class="pe-1">Total Nilai</td>
                                                                    <td>: {{ $total_score }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">Status</td>
                                                                    <td>:
                                                                        @if ($nilai_idir >= 80 || $nilai_idir < 0)
                                                                            @if ($nilai_idir >= 40)
                                                                                <span
                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                <small class="text-danger">*DSR >
                                                                                    40%</small>
                                                                            @elseif ($nilai_idir < 0)
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
                                                    <div class="col-xl-4 p-10 mt-xl-0 mt-2">
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
                                              @if ($nilai_idir >= 40)
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
                                                        <td>: {{ $pembiayaan->tgl_pembiayaan }}</td>
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
                                                                {{ $pembiayaan->nasabahh->nama_nasabah }}</span></td>
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
                                                        <td value="{{ $pembiayaan->keteranganusaha->dagang->id }}">:
                                                            {{ $pembiayaan->keteranganusaha->dagang->nama_jenisdagang }}
                                                            </option>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Alamat Usaha</td>
                                                        <td value="{{ $pembiayaan->keteranganusaha->jenispasar->id }}">:
                                                            Pasar {{ $pembiayaan->keteranganusaha->jenispasar->nama_pasar }}
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
                                                        <td value="{{ $pembiayaan->keteranganusaha->id }}">:
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
                                                                {{ number_format($pembiayaan->omset) }}</span></td>
                                                    </tr>
                                                    <div class="col-md-3">
                                                        <tr>
                                                            <td class="pe-1"> &emsp; HPP</td>
                                                            <td>: Rp. {{ number_format($pembiayaan->hpp) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-1">&emsp; Transport</td>
                                                            <td>: Rp. {{ number_format($pembiayaan->trasport) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-1">&emsp; Telpon</td>
                                                            <td>: Rp. {{ number_format($pembiayaan->telpon) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-1">&emsp; Listrik</td>
                                                            <td>: Rp. {{ number_format($pembiayaan->listrik) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-1">&emsp; Karyawan</td>
                                                            <td>: Rp. {{ number_format($pembiayaan->karyawan) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-1">&emsp; Sewa Kios / Los</td>
                                                            <td>: Rp. {{ number_format($pembiayaan->sewa) }}</td>
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
                                                            {{ number_format($angsuran) }}</span></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="pe-1">Cicilan Bank Lain</td>
                                                        <td>: Rp. {{ number_format($cicilan) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Kebutuhan Keluarga</td>
                                                        <td>: Rp. {{ number_format($pengeluaran_lain) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1 mt-1">Total Pengeluaran</td>
                                                        <td><span class="fw-bold">: Rp.
                                                                {{ number_format($total_pengeluaran) }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                            <h6>Sisa Pendapatan Bersih : Rp.
                                                {{ number_format($laba_bersih - $total_pengeluaran) }}</h6>
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
                                            @foreach ($idebs as $ideb)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td>{{ $ideb->nama_bank }}</td>
                                                    <td>Rp. {{ number_format($ideb->plafond) }}</td>
                                                    <td>Rp. {{ number_format($ideb->outstanding) }}</td>
                                                    <td style="text-align: center">{{ $ideb->tenor }}</td>
                                                    <td style="text-align: center">{{ number_format($ideb->margin) }}%
                                                    </td>
                                                    <td>Rp. {{ number_format($ideb->angsuran) }}</td>
                                                    <td style="text-align: center">{{ $ideb->agunan }}</td>
                                                    <td style="text-align: center">{{ $ideb->kol }}</td>
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
                                                        <td>: Rp. {{ number_format($harga_jual) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Jangka Waktu</td>
                                                        <td>: {{ $pembiayaan->tenor }} bulan</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Equivalen Rate</td>
                                                        <td>: {{ ($pembiayaan->rate)/100 }} %</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1">Angsuran</td>
                                                        <td>: Rp. {{ number_format($angsuran) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-1 mt-1">IDIR</td>
                                                        <td><span class="fw-bold">: {{ $nilai_idir }}
                                                                %</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Description ends -->

                                <hr class="invoice-spacing" />

                                <hr class="invoice-spacing" />

                                <!-- Invoice Note starts -->
                                {{-- <div class="card-body invoice-padding pt-0">
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
                                </div> --}}
                                <!-- Invoice Note ends -->
                            </div>
                        </div>
                        <!-- /Invoice -->

                        <!-- Invoice Actions -->
                        <div class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card">
                                @if ($nilai_idir >= 50 || $nilai_idir < 0)
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
