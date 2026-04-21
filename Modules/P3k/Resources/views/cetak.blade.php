<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cetak Proposal P3K - {{ Auth::user()->name ?? 'User' }}</title>
    <style>
        @page { size: A4 portrait; margin: 8mm; }
        body { margin:0; padding:0; font-family: "Times New Roman", serif; color:#000; }
        .print-sheet { box-sizing:border-box; max-width:210mm; margin:0 auto; padding:4mm; }
        .header { display:flex; justify-content:space-between; align-items:center; }
        .header img { height:48px; }
        .title { text-align:center; font-size:13pt; font-weight:700; margin:4px 0 6px 0; line-height:1.05; }
        .subtitle { text-align:center; font-size:10pt; margin-bottom:6px; }
        .section { margin-bottom:6px; font-size:10.5pt; }
        .table { width:100%; border-collapse:collapse; table-layout:fixed; }
        .table td, .table th { border:1px solid #222; padding:4px 6px; vertical-align:top; word-wrap:break-word; }
        .table.small td, .table.small th { font-size:10pt; }
        .label { width:32%; font-weight:600; padding-right:6px; }
        .value { width:68%; }
        .sig-table { width:100%; border-collapse:collapse; margin-top:14mm; }
        .sig-table td { border:none; padding:8px; text-align:center; vertical-align:bottom; height:70px; }
        .small { font-size:9.5pt; }
        .avoid-break { page-break-inside:avoid; break-inside:avoid; }
        .disposisi-header { text-align:center; font-weight:700; padding:8px 6px; font-size:12pt; border:2px solid #000; display:block; border-radius:2px; }
        .value { word-break:break-word; }
        .sig-table td { border:none; padding:8px; text-align:center; vertical-align:bottom; }
        .big-sig-table td { vertical-align:top; }
        .sig-box { border:1px solid #000; height:88px; box-sizing:border-box; }
        .sig-label { font-weight:700; margin-top:6px; }
        .date-line { margin-top:6px; font-size:10pt; }
        @media print {
            .no-print{ display:none !important; }
            .header img { height:44px; }
            .title { font-size:12.5pt }
            .print-sheet { padding:3mm }
        }
    </style>
</head>
<body>
    <main class="print-sheet">
        <header class="header">
            <div><img src="{{ asset('logo.png') }}" alt="logo-left"></div>
            <div style="text-align:right"><img src="{{ asset('logoib.png') }}" alt="logo-right"></div>
        </header>

        <section class="section avoid-break">
            <div class="disposisi-header">DISPOSISI BERKAS PEMBIAYAAN</div>
            <table class="table">
                <tr>
                    <td class="label">Nama Calon Nasabah</td>
                    <td class="value">{{ $pembiayaan->nasabah->nama_nasabah ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Pekerjaan</td>
                    <td class="value">{{ optional($pembiayaan->nasabah->pekerjaan)->nama_pekerjaan ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Unit Kerja</td>
                    <td class="value">{{ optional($pembiayaan->nasabah->pekerjaan)->nama_unit_kerja ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Produk</td>
                    <td class="value">{{ $pembiayaan->jenis_penggunaan ?? 'P3K' }}</td>
                </tr>
                <tr>
                    <td class="label">Plafond</td>
                    <td class="value">Rp{{ number_format((float)($pembiayaan->nominal_pembiayaan ?? 0),0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="label">Margin</td>
                    <td class="value">{{ number_format((float)($pembiayaan->rate ?? 0),2,',','.') }} %</td>
                </tr>
                <tr>
                    <td class="label">Jangka Waktu</td>
                    <td class="value">{{ $tenor ?? '-' }} Bulan</td>
                </tr>
                <tr>
                    <td class="label">Nama AO</td>
                    <td class="value">{{ Auth::user()->name ?? '-' }}</td>
                </tr>
            </table>
        </section>

        <section class="section avoid-break">
            <table style="width:100%;border-collapse:collapse;margin-top:12mm;">
                <tr>
                    <td colspan="3" style="border:1px solid #222;text-align:center;font-weight:700;padding:8px;background:#fff;">BAGIAN MARKETING</td>
                </tr>
                        <tr>
                    <td style="width:35%;border:1px solid #222;vertical-align:top;padding:6px;">
                        <div style="text-align:center;font-weight:700">AO</div>
                        <div style="height:80px;"></div>
                        <div style="border-top:1px solid #222;padding-top:4px;text-align:center;font-size:9pt;">{{ $namaAO }}</div>
                        <div style="font-weight:700;text-align:left;padding-top:2px;">TGL : {{ \Carbon\Carbon::now()->format('d-m-Y') }}</div>
                    </td>
                    <td style="width:30%;border:1px solid #222;vertical-align:top;padding:6px;text-align:center;">
                        <div style="height:120px;"></div>
                    </td>
                    <td style="width:35%;border:1px solid #222;vertical-align:top;padding:6px;">
                        <div style="text-align:center;font-weight:700">KABAG MKT</div>
                        <div style="height:80px;"></div>
                        <div style="border-top:1px solid #222;padding-top:4px;text-align:center;font-size:9pt;">{{ $namaKabag }}</div>
                        <div style="font-weight:700;text-align:left;padding-top:2px;">TGL : </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="height:10mm;border:none"></td>
                </tr>
                <tr>
                    <td colspan="3" style="border:1px solid #222;text-align:center;font-weight:700;padding:8px;background:#fff;">BAGIAN RISK</td>
                </tr>
                <tr>
                    <td style="width:33.333%;border:1px solid #222;vertical-align:top;padding:6px;text-align:center;">
                        <div style="font-weight:700">ADM</div>
                        <div style="height:90px;"></div>
                        <div style="border-top:1px solid #222;padding-top:6px;font-weight:700;text-align:left">TGL : </div>
                    </td>
                    <td style="width:33.333%;border:1px solid #222;vertical-align:top;padding:6px;text-align:center;">
                        <div style="font-weight:700">KABAG RISK</div>
                        <div style="height:90px;"></div>
                        <div style="border-top:1px solid #222;padding-top:6px;font-weight:700;text-align:left">TGL : </div>
                    </td>
                    <td style="width:33.333%;border:1px solid #222;vertical-align:top;padding:6px;text-align:center;">
                        <div style="font-weight:700">CUSTODIAN</div>
                        <div style="height:90px;"></div>
                        <div style="border-top:1px solid #222;padding-top:6px;font-weight:700;text-align:left">TGL : </div>
                    </td>
                </tr>
            </table>
        </section>

        <footer class="small no-print" style="margin-top:8mm">Dicetak dari Aplikasi FOS BPRS BTB oleh: {{ Auth::user()->name ?? '-' }} pada {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</footer>

            <div class="legacy-page" style="page-break-before:always;">
                <header class="header">
                    <div><img src="{{ asset('logo.png') }}" alt="logo-left"></div>
                    <div style="text-align:right"><img src="{{ asset('logoib.png') }}" alt="logo-right"></div>
                </header>

                <section class="section avoid-break">
                    <div class="disposisi-header">USULAN PEMBIAYAAN P3K</div>
                    <table class="table small" style="margin-top:6px;">
                        <tr>
                            <td class="label">Tanggal</td>
                            <td class="value">{{ $pembiayaan->tanggal_pengajuan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Penggunaan</td>
                            <td class="value">{{ $pembiayaan->jenis_penggunaan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Jenis Fasilitas</td>
                            <td class="value">{{ $pembiayaan->akad ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Nama Nasabah</td>
                            <td class="value">{{ $pembiayaan->nasabah->nama_nasabah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">No Telp / Hp</td>
                            <td class="value">{{ $pembiayaan->nasabah->no_hp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Tlp Tdk Serumah</td>
                            <td class="value">{{ optional($pembiayaan->nasabah->orangTerdekat)->no_telp_orang_terdekat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Alamat</td>
                            <td class="value">{{ $pembiayaan->nasabah->alamat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">No. KTP</td>
                            <td class="value">{{ $pembiayaan->nasabah->no_ktp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Tempat, Tgl Lahir</td>
                            <td class="value">{{ $pembiayaan->nasabah->tempat_lahir ?? '-' }}, {{ optional($pembiayaan->nasabah)->tgl_lahir ? strftime('%d-%m-%Y', strtotime($pembiayaan->nasabah->tgl_lahir)) : '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Usia</td>
                            <td class="value">
                                @php
                                    if(!empty($pembiayaan->nasabah->tgl_lahir)){
                                        $tgl_lahir = \Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir);
                                        $umur = \Carbon\Carbon::now()->diffInYears($tgl_lahir);
                                    } else { $umur = '-'; }
                                @endphp
                                {{ $umur }} Tahun
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Unit Kerja</td>
                            <td class="value">{{ optional($pembiayaan->nasabah->pekerjaan)->nama_unit_kerja ?? '-' }}</td>
                        </tr>
                    </table>
                </section>

                <section class="section avoid-break">
                    <table style="width:100%;border-collapse:collapse;">
                        <tr>
                            <td style="width:50%;vertical-align:top;padding-right:6px;">
                                <div style="font-weight:700;margin-bottom:6px">Pendapatan</div>
                                <table class="table small">
                                    <tr>
                                        <td class="label">Gaji Pokok</td>
                                        <td class="value">Rp{{ number_format((float)($pembiayaan->gaji_pokok ?? 0),0,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Gaji TPP</td>
                                        <td class="value">Rp{{ number_format((float)($pembiayaan->gaji_tpp ?? 0),0,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Pendapatan Pasangan</td>
                                        <td class="value">Rp{{ number_format((float)($pembiayaan->gaji_pasangan ?? 0),0,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Jml. Pend. Join Income</td>
                                        <td class="value">Rp{{ number_format((float)($pendapatanBersihJoinIncome ?? 0),0,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Jumlah Pendapatan</td>
                                        <td class="value">Rp{{ number_format((float)($pembiayaan->gaji_pokok ?? 0) + (float)($pembiayaan->gaji_tpp ?? 0) + (float)($pembiayaan->gaji_pasangan ?? 0),0,',','.') }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width:50%;vertical-align:top;padding-left:6px;">
                                <div style="font-weight:700;margin-bottom:6px">Pengeluaran</div>
                                <table class="table small">
                                    <tr>
                                        <td class="label">Angsuran BTB (Fas. Aktif)</td>
                                        <td class="value">Rp{{ number_format((float)($pembiayaan->total_angsuran_btb_fas_aktif ?? 0),0,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Pengeluaran Lainnya</td>
                                        <td class="value">Rp{{ number_format((float)($pembiayaan->pengeluaran_lainnya ?? 0),0,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Jumlah Pengeluaran</td>
                                        <td class="value">Rp{{ number_format((float)($pembiayaan->total_angsuran_btb_fas_aktif ?? 0) + (float)($pembiayaan->pengeluaran_lainnya ?? 0),0,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Sisa Pendapatan Bersih</td>
                                        <td class="value">Rp{{ number_format((float)($pendapatanBersih ?? 0),0,',','.') }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </section>

                <section class="section avoid-break">
                    <div style="font-weight:700;margin-bottom:6px">Jenis Fasilitas Pembiayaan</div>
                    <table class="table small">
                        <tr>
                            <td class="label">Jenis Fasilitas Pembiayaan</td>
                            <td class="value">{{ $pembiayaan->akad ?? '-' }}</td>
                            <td class="label">Penggunaan</td>
                            <td class="value">{{ $pembiayaan->jenis_penggunaan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Harga Beli</td>
                            <td class="value">Rp{{ number_format((float)($pembiayaan->nominal_pembiayaan ?? 0),0,',','.') }}</td>
                            <td class="label">Harga Jual</td>
                            <td class="value">Rp{{ number_format($hargaJual ?? 0,0,',','.') }}</td>
                        </tr>
                        <tr>
                            <td class="label">Jangka Waktu</td>
                            <td class="value">{{ $tenor ?? '-' }} Bulan</td>
                            <td class="label">Equivalen Rate</td>
                            <td class="value">{{ number_format((float)($pembiayaan->rate ?? 0),2,',','.') }} %</td>
                        </tr>
                        <tr>
                            <td class="label">Angsuran</td>
                            <td class="value">Rp{{ number_format($angsuran ?? 0,0,',','.') }}/Bulan</td>
                            <td class="label">Jaminan</td>
                            <td class="value">{{ $pembiayaan->jaminan ?? 'SK Pengangkatan/Terakhir' }}</td>
                        </tr>
                        <tr>
                            <td class="label">DSR</td>
                            <td class="value">{{ $dsr ?? '-' }} %</td>
                            <td class="label">DSR Join Income</td>
                            <td class="value">{{ $dsrJoinIncome ?? '-' }} %</td>
                        </tr>
                    </table>
                </section>

                <section class="section avoid-break">
                    <table class="table" style="margin-top:8px;">
                        <tr>
                            <td style="width:33.33%;text-align:center;font-weight:700;border:1px solid #222;padding:6px;">AO</td>
                            <td style="width:33.33%;text-align:center;font-weight:700;border:1px solid #222;padding:6px;">KABAG MARKETING</td>
                            <td style="width:33.33%;text-align:center;font-weight:700;border:1px solid #222;padding:6px;">ANALIS</td>
                        </tr>
                        <tr>
                            <td style="height:88px;border:1px solid #222;padding:6px;"></td>
                            <td style="height:88px;border:1px solid #222;padding:6px;"></td>
                            <td style="height:88px;border:1px solid #222;padding:6px;"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;border:1px solid #222;padding:6px 6px;font-weight:700;">TGL : </td>
                            <td style="text-align:left;border:1px solid #222;padding:6px 6px;font-weight:700;">TGL : </td>
                            <td style="text-align:left;border:1px solid #222;padding:6px 6px;font-weight:700;">TGL : </td>
                        </tr>
                        <tr>
                            <td style="text-align:center;border:1px solid #222;padding:4px 6px;font-size:9pt;">{{ $namaAO }}</td>
                            <td style="text-align:center;border:1px solid #222;padding:4px 6px;font-size:9pt;">{{ $namaKabag }}</td>
                            <td style="text-align:center;border:1px solid #222;padding:4px 6px;font-size:9pt;">{{ $namaAnalis }}</td>
                        </tr>
                    </table>
                </section>

                <section class="section avoid-break">
                    <div style="font-weight:700;margin-bottom:6px">Catatan</div>
                    @if(!empty($catatanApprovals) && count($catatanApprovals))
                        @foreach($catatanApprovals as $note)
                            <div style="margin-bottom:8px;">
                                <div style="font-weight:700">{{ optional($note->statushistory)->keterangan }} - {{ optional($note->jabatan)->keterangan }}</div>
                                <div style="white-space:pre-wrap;">{!! nl2br(e($note->catatan)) !!}</div>
                            </div>
                        @endforeach
                    @else
                        <div>-</div>
                    @endif
                </section>

                <footer class="small no-print" style="margin-top:8mm">Dicetak dari Aplikasi FOS BPRS BTB oleh: {{ Auth::user()->name ?? '-' }} pada {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</footer>

            </div>
    </main>

    <script>
        // Auto-print if URL contains ?print=1
        try {
            if (new URLSearchParams(location.search).get('print') === '1') {
                window.addEventListener('load', function() {
                    setTimeout(function(){ window.print(); }, 200);
                });
            }
        } catch (e) {
            // safe-fail
            console.error('auto-print error', e);
        }
    </script>
</body>
</html>
