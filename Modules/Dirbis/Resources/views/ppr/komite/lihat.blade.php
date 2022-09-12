@extends('dirbis::layouts.main')
@section('content')
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
                                    <ul class="nav nav-tabs nav-justified" id="komiteTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="proposal-tab" data-bs-toggle="tab"
                                                href="#proposal" role="tab" aria-controls="proposal-just"
                                                aria-selected="true">Proposal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ftv-tab" data-bs-toggle="tab" href="#ftv"
                                                role="tab" aria-controls="ftv-just" aria-selected="true">FTV</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="dokumentasi-tab" data-bs-toggle="tab"
                                                href="#dokumentasi" role="tab" aria-controls="dokumentasi-just"
                                                aria-selected="true">Dokumentasi Perkembangan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="timeline-tab" data-bs-toggle="tab" href="#timeline"
                                                role="tab" aria-controls="timeline-just"
                                                aria-selected="false">Timeline</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content pt-1">
                                        <div class="tab-pane active" id="proposal" role="tabpanel"
                                            aria-labelledby="proposal-tab">
                                            <!-- proposal -->
                                            <div class="col-xl-12 col-md-8 col-12">
                                                <div class="card invoice-preview-card">


                                                    <!-- Address and Contact starts -->
                                                    <div class="card-body invoice-padding pt-0">
                                                        <div class="row invoice-spacing">
                                                            <div class="col-xl-8 p-0">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Jenis Nasabah</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->jenis_nasabah }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Tanggal Pengajuan</td>
                                                                            <td>:
                                                                                {{ date_format($pembiayaan->created_at, 'd-m-Y') }}
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td class="pe-1">Akad</td>
                                                                            <td>:
                                                                                @if ($pembiayaan->form_permohonan_jenis_akad_pembayaran_lain != null)
                                                                                    {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran_lain }}
                                                                                @else
                                                                                    {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran }}
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Peruntukan</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->form_permohonan_peruntukan_ppr }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Nama Nasabah</td>
                                                                            <td><span class="fw-bold">:
                                                                                    {{ $pembiayaan->pemohon->form_pribadi_pemohon_nama_lengkap }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Jenis Kelamin</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_jenis_kelamin }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">No. Telp</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_no_telp }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Alamat</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_domisili }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">No. KTP</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_no_ktp }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Tempat, tanggal lahir</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_tempat_lahir }},
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_tanggal_lahir }}
                                                                            </td>
                                                                        </tr>
                                                                        {{-- <tr>
                                                                            <td class="pe-1">Kantor/Dinas</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->instansi->nama_instansi }}
                                                                            </td>
                                                                        </tr> --}}
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                                <h6 class="mb-1">Pendapatan :</h6>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Penghasilan Utama</td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_penghasilan_utama_pemohon) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Penghasilan Lainnya</td>
                                                                            <td>: Rp.
                                                                                {{ number_format($pembiayaan->form_penghasilan_pengeluaran_penghasilan_lain_pemohon) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Penghasilan Utama Pasangan
                                                                            </td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_penghasilan_utama_istri_suami) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Penghasilan Lainnya Pasangan
                                                                            </td>
                                                                            <td>: Rp.
                                                                                {{ number_format($pembiayaan->form_penghasilan_pengeluaran_penghasilan_lain_istri_suami) }}
                                                                            </td>
                                                                        </tr>
                                                                        {{-- <tr>
                                                                            <td class="pe-1">Gaji TPP</td>
                                                                            <td>: Rp.
                                                                                {{ number_format($pembiayaan->gaji_tpp) }}
                                                                            </td>
                                                                        </tr> --}}
                                                                        <tr>
                                                                            <td class="pe-1 mt-2">Total Penghasilan</td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_total_penghasilan) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <hr>
                                                                <h6 class="mb-1 mt-2">Pengeluaran :</h6>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Biaya Hidup Keluarga</td>
                                                                            <td>: Rp.
                                                                                {{ number_format($pembiayaan->form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga) }}
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td class="pe-1">Kewajiban Angsuran</td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_kewajiban_angsuran) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1 mt-1">Total Pengeluaran
                                                                            </td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_total_pengeluaran) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <hr>
                                                                <h6>Sisa Penghasilan Bersih : Rp.
                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_sisa_penghasilan) }}
                                                                </h6>
                                                                <h6>Kemampuan Mengangsur : Rp.
                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_kemampuan_mengangsur) }}
                                                                </h6>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Address and Contact ends -->



                                                    <hr class="invoice-spacing" />

                                                    <div class="card-body invoice-padding pb-0">
                                                        <!-- Header starts -->
                                                        <div
                                                            class="d-flex justify-content-center  flex-column invoice-spacing mt-0 col-xl-12 col-md-8 col-12">
                                                            <div>
                                                                <h4>Summary </h4>
                                                                <hr>
                                                                <div class="table-responsive mt-1">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="text-align: center"
                                                                                    width="2%">No
                                                                                </th>
                                                                                <th style="text-align: center">
                                                                                    Parameter
                                                                                </th>
                                                                                <th style="text-align: center">% Bobot
                                                                                </th>
                                                                                <th style="text-align: center">Bobot Bersih
                                                                                </th>
                                                                                <th style="text-align: center">Keterangan
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>1</strong>
                                                                                    </td>
                                                                                    <td style="vertical-align: middle;">
                                                                                        <strong>Ability To Repay</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>50%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringAtrFixedIncome->atr_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringAtrFixedIncome->atr_fixed_score >= 1.7)
                                                                                            <strong>Sangat Baik</strong>
                                                                                        @elseif($scoring->scoringAtrFixedIncome->atr_fixed_score >= 1.4 &&
                                                                                            $scoring->scoringAtrFixedIncome->atr_fixed_score < 1.7)
                                                                                            <strong>Cukup Baik</strong>
                                                                                        @else
                                                                                            <strong>Kurang</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pekerjaan
                                                                                    </td>
                                                                                    <td style="text-align: center">8%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_pekerjaan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pengalaman/Riwayat
                                                                                        Pembiayaan
                                                                                    </td>
                                                                                    <td style="text-align: center">8%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_pengalaman_riwayat_pembiayaan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Keamanan
                                                                                        Bisnis/Pekerjaan
                                                                                    </td>
                                                                                    <td style="text-align: center">12%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_keamanan_bisnis_pekerjaan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Potensi Pertumbuhan
                                                                                        Hasil
                                                                                    </td>
                                                                                    <td style="text-align: center">15%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_potensi_pertumbuhan_hasil }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pengalaman Kerja
                                                                                    </td>
                                                                                    <td style="text-align: center">5%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_pengalaman_kerja }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pendidikan
                                                                                    </td>
                                                                                    <td style="text-align: center">9%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_pendidikan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Usia
                                                                                    </td>
                                                                                    <td style="text-align: center">6%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_usia }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Sumber Pendapatan
                                                                                    </td>
                                                                                    <td style="text-align: center">10%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_sumber_pendapatan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pendapatan Bersih
                                                                                    </td>
                                                                                    <td style="text-align: center">20%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_pendapatan_gaji_bersih }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Jumlah Tanggungan
                                                                                        Keluarga
                                                                                    </td>
                                                                                    <td style="text-align: center">7%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_jml_tanggungan_keluarga }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>2</strong>
                                                                                    </td>
                                                                                    <td class="pe-1">
                                                                                        <strong>Willingness To
                                                                                            Repay</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>25%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringWtrFixedIncome->wtr_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringWtrFixedIncome->wtr_fixed_score >= 0.9)
                                                                                            <strong>Sangat Baik</strong>
                                                                                        @elseif($scoring->scoringWtrFixedIncome->wtr_fixed_score >= 0.75 &&
                                                                                            $scoring->scoringWtrFixedIncome->wtr_fixed_score < 0.9)
                                                                                            <strong>Cukup Baik</strong>
                                                                                        @else
                                                                                            <strong>Kurang</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Tempat Bekerja
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_tempat_bekerja }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Konsistensi
                                                                                    </td>
                                                                                    <td style="text-align: center">12%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_konsistensi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kelengkapan dan
                                                                                        Validitas Data
                                                                                    </td>
                                                                                    <td style="text-align: center">15%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_kelengkapan_validitas_data }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pembayaran Angsuran
                                                                                        Kolektif
                                                                                    </td>
                                                                                    <td style="text-align: center">20%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_pembayaran_angsuran_kolektif }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pengalaman
                                                                                        Pembiayaan
                                                                                    </td>
                                                                                    <td style="text-align: center">10%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_pengalaman_pembiayaan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Motivasi
                                                                                    </td>
                                                                                    <td style="text-align: center">20%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_motivasi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Referensi
                                                                                    </td>
                                                                                    <td style="text-align: center">10%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_referensi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>3</strong>
                                                                                    </td>
                                                                                    <td class="pe-1">
                                                                                        <strong>Collateral Coverage</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>25%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringCollateralFixedIncome->cc_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringCollateralFixedIncome->cc_fixed_score >= 0.9)
                                                                                            <strong>Sangat Baik</strong>
                                                                                        @elseif($scoring->scoringCollateralFixedIncome->cc_fixed_score >= 0.75 &&
                                                                                            $scoring->scoringCollateralFixedIncome->cc_fixed_score < 0.9)
                                                                                            <strong>Cukup Baik</strong>
                                                                                        @else
                                                                                            <strong>Kurang</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Marketabilitas
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_marketabilitas }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kontribusi Pemohon
                                                                                        (FTV)
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_kontribusi_pemohon_ftv }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pertumbuhan Agunan
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_pertumbuhan_agunan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Daya Tarik Agunan
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_daya_tarik_agunan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Jangka Waktu
                                                                                        Likuidasi
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_jangka_waktu_likuidasi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>
                                                                            @elseif ($pembiayaan->jenis_nasabah == 'Non Fixed Income')
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>1</strong>
                                                                                    </td>
                                                                                    <td style="vertical-align: middle;">
                                                                                        <strong>Ability To Repay</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>50%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringAtrNonFixedIncome->atr_non_fixed_score >= 1.7)
                                                                                            <strong>Sangat Baik</strong>
                                                                                        @elseif($scoring->scoringAtrNonFixedIncome->atr_non_fixed_score >= 1.4 &&
                                                                                            $scoring->scoringAtrNonFixedIncome->atr_non_fixed_score < 1.7)
                                                                                            <strong>Cukup Baik</strong>
                                                                                        @else
                                                                                            <strong>Kurang</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Situasi Pasar dan
                                                                                        Persaingan
                                                                                    </td>
                                                                                    <td style="text-align: center">14%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_situasi_persaingan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kaderisasi
                                                                                    </td>
                                                                                    <td style="text-align: center">14%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_kaderisasi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kualifikasi
                                                                                        Komersial
                                                                                    </td>
                                                                                    <td style="text-align: center">14%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_kualifikasi_komersial }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kualifikasi Teknis
                                                                                    </td>
                                                                                    <td style="text-align: center">15%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_kualifikasi_teknis }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kualitas Produk dan
                                                                                        Jasa
                                                                                    </td>
                                                                                    <td style="text-align: center">15%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_kualitas_produk_jasa }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Sistem Pembayaran
                                                                                    </td>
                                                                                    <td style="text-align: center">14%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_sistem_pembayaran }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Lokasi Usaha
                                                                                    </td>
                                                                                    <td style="text-align: center">14%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_lokasi_usaha }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>2</strong>
                                                                                    </td>
                                                                                    <td class="pe-1">
                                                                                        <strong>Willingness To
                                                                                            Repay</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>25%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringWtrNonFixedIncome->wtr_non_fixed_score >= 0.9)
                                                                                            <strong>Sangat Baik</strong>
                                                                                        @elseif($scoring->scoringWtrNonFixedIncome->wtr_non_fixed_score >= 0.75 &&
                                                                                            $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_score < 0.9)
                                                                                            <strong>Cukup Baik</strong>
                                                                                        @else
                                                                                            <strong>Kurang</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Tingkat Kepercayaan
                                                                                    </td>
                                                                                    <td style="text-align: center">25%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_tingkat_kepercayaan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pengelolaan Rekening
                                                                                        Bank
                                                                                    </td>
                                                                                    <td style="text-align: center">25%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_pengelolaan_rekening }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Reputasi Bisnis
                                                                                    </td>
                                                                                    <td style="text-align: center">15%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_reputasi_bisnis }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Perilaku Pribadi
                                                                                        Debitur
                                                                                    </td>
                                                                                    <td style="text-align: center">20%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_perilaku_pribadi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>3</strong>
                                                                                    </td>
                                                                                    <td class="pe-1">
                                                                                        <strong>Collateral Coverage</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>25%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringCollateralNonFixedIncome->cc_non_fixed_score >= 0.9)
                                                                                            <strong>Sangat Baik</strong>
                                                                                        @elseif($scoring->scoringCollateralNonFixedIncome->cc_non_fixed_score >= 0.75 &&
                                                                                            $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_score < 0.9)
                                                                                            <strong>Cukup Baik</strong>
                                                                                        @else
                                                                                            <strong>Kurang</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Marketabilitas
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_marketabilitas }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kontribusi Pemohon
                                                                                        (FTV)
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_kontribusi_pemohon_ftv }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pertumbuhan Agunan
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_pertumbuhan_agunan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Daya Tarik Agunan
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_daya_tarik_agunan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Jangka Waktu
                                                                                        Likuidasi
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_jangka_waktu_likuidasi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>
                                                                            @else
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <br />
                                                                @php
                                                                    $score = $pembiayaan->scoring->ppr_total_score;
                                                                @endphp
                                                                <div class="card-body invoice-padding pt-0">
                                                                    <div class="row invoice-spacing">
                                                                        <div class="col-xl-7 p-0">
                                                                            <table>
                                                                                <tbody>

                                                                                    <tr>
                                                                                        <td class="pe-1">Total Nilai
                                                                                        </td>
                                                                                        <td>: {{ $score }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Status</td>
                                                                                        <td>:
                                                                                            @if ($score >= 3.5)
                                                                                                <span
                                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                            @elseif($score >= 2.9 && $score < 3.5)
                                                                                                <span
                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                    Ulang</span>
                                                                                            @else
                                                                                                <span
                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
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
                                                                                        <td class="pe-1 mb-2">Nilai < 2.9
                                                                                                </td>
                                                                                        <td>: <span class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2"><br>Nilai >=
                                                                                            2.9
                                                                                            dan < 3.5 </td>
                                                                                        <td><br>: <span
                                                                                                class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                    Ulang</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2"><br>Nilai >=
                                                                                            3.5
                                                                                        </td>
                                                                                        <td><br>: <span
                                                                                                class="fw-bold"><span
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


                                                    <hr class="invoice-spacing" />
                                                    <!-- Invoice Note starts -->
                                                    <div class="card-body invoice-padding pt-0">
                                                        <div class="row invoice-spacing">
                                                            <div class="col-xl-3 p-0">
                                                            </div>
                                                            <div class="col-xl-5 p-0 mt-xl-0 mt-2">
                                                                @php
                                                                    $historystatus = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                                                                        ->where('form_ppr_pembiayaan_id', $pembiayaan->id)
                                                                        ->orderby('created_at', 'desc')
                                                                        ->get()
                                                                        ->first();
                                                                @endphp
                                                                @if ($historystatus->status_id == 4 && $historystatus->jabatan_id == 4)
                                                                    <div class="card-body">
                                                                        <button class="btn btn-success w-100"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#lanjut_komite">
                                                                            Disetujui
                                                                        </button>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <button class="btn btn-warning w-100"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#edit_proposal">
                                                                            Rekomendasi Revisi
                                                                        </button>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Invoice Note ends -->
                                                    <!-- add new card modal  -->
                                                    <div class="modal fade" id="lanjut_komite" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                        Apakah Anda Yakin Untuk Melanjutkan Ke Komite ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <!-- form -->
                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/dirbis/ppr/komite">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden"
                                                                            name="form_ppr_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=5>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">

                                                                        <div class="col-12 text-center">
                                                                            <button type="submit"
                                                                                class="btn btn-primary me-1 mt-1">Submit</button>
                                                                            <button type="reset"
                                                                                class="btn btn-outline-secondary mt-1"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                Cancel
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ add new card modal  -->

                                                    <!-- add new card modal  -->
                                                    <div class="modal fade" id="edit_proposal" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                        Rekomendasi Revisi Proposal ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <!-- form -->
                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/dirbis/ppr/komite">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden"
                                                                            name="form_ppr_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=7>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">

                                                                        <div class="col-12 text-center">
                                                                            <button type="submit"
                                                                                class="btn btn-primary me-1 mt-1">Submit</button>
                                                                            <button type="reset"
                                                                                class="btn btn-outline-secondary mt-1"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                Cancel
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ add new card modal  -->

                                                </div>
                                            </div>
                                            <!-- /proposal -->
                                        </div>

                                        <div class="tab-pane" id="ftv" role="tabpanel" aria-labelledby="ftv-tab">
                                            <div class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                                <div class="card">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="dokumentasi" role="tabpanel"
                                            aria-labelledby="dokumentasi-tab">
                                            <div class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                                <div class="card">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="timeline" role="tabpanel"
                                            aria-labelledby="timeline-tab">
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
                                                                            <span
                                                                                class="timeline-event-time">{{ $timeline->created_at->isoformat('dddd, D MMMM Y') }}</span>
                                                                        </div>
                                                                        @if (isset($timeline->catatan))
                                                                            <p value="{{ $timeline->id }}"> <br>Catatan :
                                                                                {{ $timeline->catatan }}
                                                                            <p>
                                                                        @endif
                                                                        <span
                                                                            class="timeline-event-time">{{ $timeline->created_at->diffForHumans() }}</span>
                                                                        {{-- <p>{{ $timeline->created_at->diffForHumans() }}</p> --}}
                                                                        <div class="d-flex flex-row align-items-center">

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                            <hr class="invoice-spacing" />
                                                            <p class="fw-bold"> Total SLA = {{ $totalwaktu }}</p>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Justified Tabs ends -->
                            </div>
                </section>
                <!-- Idir -->
                <div class="modal fade" id="dsr" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            {{-- <div class="modal-body px-sm-5 mx-50 pb-5">
                                <h3 class="text-center">Nilai DSR </h3>
                                <hr class="invoice-spacing" />
                                <div class="card-body">
                                    <div class="col-md-12 d-flex order-md-2 order-1">
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
                                                    <td>: Rp. {{ number_format($harga_jual) }}
                                                    </td>
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
                                                    <td>: Rp. {{ number_format($angsuran1) }}
                                                    </td>
                                                </tr>
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
                            </div> --}}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    @endsection
