<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cetak Proposal Ultra Mikro - {{ Auth::user()->name ?? 'User' }}</title>
    <style>
        @page { size: A4 portrait; margin: 8mm; }
        html,body { height: 297mm; }
        body { margin:0; padding:0; font-family: "Times New Roman", serif; color:#000; }
        .print-sheet { box-sizing:border-box; max-width:210mm; margin:0 auto; padding:6mm; }
        .header { display:flex; justify-content:space-between; align-items:center; }
        .header img { height:50px; }
        .title { text-align:center; font-size:14pt; font-weight:700; margin:6px 0 8px 0; }
        .subtitle { text-align:center; font-size:11pt; margin-bottom:8px; }
        .section { margin-bottom:8px; font-size:11pt; }
        .table { width:100%; border-collapse:collapse; }
        .table td, .table th { border:1px solid #222; padding:6px 8px; vertical-align:top; }
        .label { width:36%; font-weight:600; }
        .value { width:64%; }
        .sig-table { width:100%; border-collapse:collapse; margin-top:12mm; }
        .sig-table td { border:none; padding:10px; text-align:center; vertical-align:bottom; height:70px; }
        .small { font-size:10pt; }
        .avoid-break { page-break-inside:avoid; break-inside:avoid; }
        @media print { .no-print{ display:none !important; } }
    </style>
</head>
<body>
    <main class="print-sheet">
        <header class="header">
            <div><img src="{{ asset('logo_form.png') }}" alt="logo-left"></div>
            <div style="text-align:center;flex:1">
                <div class="title">USULAN PEMBIAYAAN ULTRA MIKRO</div>
                <div class="subtitle small">Dicetak dari Sistem FOS BPRS BTB</div>
            </div>
            <div style="text-align:right"><img src="{{ asset('logoib.png') }}" alt="logo-right"></div>
        </header>

        <section class="section avoid-break">
            <table class="table">
                <tr>
                    <td colspan="2" style="text-align:center;font-weight:700">DISPOSISI BERKAS PEMBIAYAAN</td>
                </tr>
                <tr>
                    <td class="label">Nama Calon Nasabah</td>
                    <td class="value">{{ $pembiayaan->nasabah->nama_nasabah ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Pekerjaan / Unit Kerja</td>
                    <td class="value">{{ optional($pembiayaan->nasabah->pekerjaan)->nama_unit_kerja ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Produk / Plafond</td>
                    <td class="value">Ultra Mikro / Rp{{ number_format($pembiayaan->nominal_pembiayaan ?? 0,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="label">Margin / Tenor</td>
                    <td class="value">{{ number_format($pembiayaan->rate ?? 0,2,',','.') }} % / {{ $tenor ?? '-' }} Bulan</td>
                </tr>
                <tr>
                    <td class="label">AO</td>
                    <td class="value">{{ Auth::user()->name ?? '-' }}</td>
                </tr>
            </table>
        </section>

        <section class="section avoid-break">
            <div style="font-weight:700;margin-bottom:6px">Data Keuangan</div>
            <table class="table small">
                <tr>
                    <td class="label">Tanggal</td>
                    <td class="value">{{ $pembiayaan->tanggal_pengajuan ?? '-' }}</td>
                    <td class="label">Pendapatan</td>
                    <td class="value">Rp{{ number_format($pembiayaan->gaji_pokok ?? 0,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="label">Penggunaan</td>
                    <td class="value">{{ $pembiayaan->jenis_penggunaan ?? '-' }}</td>
                    <td class="label">Gaji TPP</td>
                    <td class="value">Rp{{ number_format($pembiayaan->gaji_tpp ?? 0,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td class="value">{{ $pembiayaan->nasabah->alamat ?? '-' }}</td>
                    <td class="label">Sisa Pendapatan Bersih</td>
                    <td class="value">Rp{{ number_format($pendapatanBersih ?? 0,0,',','.') }}</td>
                </tr>
            </table>
        </section>

        <section class="section avoid-break">
            <div style="font-weight:700;margin-bottom:6px">Rincian Pembiayaan</div>
            <table class="table small">
                <tr>
                    <td class="label">Harga Beli / Jual</td>
                    <td class="value">Rp{{ number_format($pembiayaan->harga_beli ?? 0,0,',','.') }} / Rp{{ number_format($hargaJual ?? 0,0,',','.') }}</td>
                </tr>
                <tr>
                    <td class="label">Angsuran</td>
                    <td class="value">Rp{{ number_format($angsuran ?? 0,0,',','.') }} / Bulan</td>
                </tr>
                <tr>
                    <td class="label">Jaminan</td>
                    <td class="value">{{ $pembiayaan->jaminan ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">DSR</td>
                    <td class="value">{{ $dsr ?? '-' }} %</td>
                </tr>
            </table>
        </section>

        <section class="section avoid-break">
            <div style="font-weight:700;margin-bottom:6px">Catatan Komite</div>
            @if(!empty($catatanApprovals) && count($catatanApprovals))
                @foreach($catatanApprovals as $note)
                    <div style="margin-bottom:8px;">
                        <div style="font-weight:700">{{ optional($note->statushistory)->keterangan }} - {{ optional($note->jabatan)->keterangan }}</div>
                        <div style="white-space:pre-wrap;">{!! nl2br(e($note->catatan)) !!}</div>
                    </div>
                @endforeach
            @else
                <div>- Tidak ada catatan -</div>
            @endif
        </section>

        <section class="section avoid-break">
            <table class="sig-table">
                <tr>
                    <td>Direktur Bisnis<br><br>____________________</td>
                    <td>ADM<br><br>____________________</td>
                    <td>Kabag Risk<br><br>____________________</td>
                    <td>Custodian<br><br>____________________</td>
                </tr>
            </table>
        </section>

        <footer class="small no-print" style="margin-top:8mm">Dicetak oleh: {{ Auth::user()->name ?? '-' }} pada {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</footer>
    </main>
</body>
</html>
                                <span
                                    style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif'>Jangka
                                    Waktu</span>
                            </p>
                            <p class=MsoNormal style='margin-bottom:0cm;text-align:justify;line-height:
         150%'>
                                <span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif'>Nama
                                    AO</span>
                            </p>
                        </td>
                        <td width=381 valign=top
                            style='width:285.7pt;padding:0cm 5.4pt 0cm 5.4pt;
         height:160.8pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;text-align:justify;line-height:
         150%'>
                                <span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif'>:
                                    {{ $pembiayaan->nasabah->nama_nasabah }}</span>
                            </p>
                            <p class=MsoNormal style='margin-bottom:0cm;text-align:justify;line-height:
         150%'>
                                <span style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif'>:
                                    {{ $pembiayaan->nasabah->nama_pekerjaan }} <br>
                                    : Pembiayaan Multi Guna<br>
                                    : Rp{{ number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.') }}<br>
                                    : {{ $tenor }} Bulan<br>
                                    : {{ Auth::user()->name }}</span>
                            </p>
                        </td>
                    </tr>
                </table>

                <p class=MsoNormal><span
                        style='font-size:12.0pt;line-height:106%;font-family:
       "Times New Roman",serif'>&nbsp;</span>
                </p>

                <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
                    style='border-collapse:collapse;border:none'>
                    <tr style='height:25.85pt'>
                        <td width=570 colspan=3
                            style='width:427.2pt;border:solid windowtext 1.0pt;
         padding:0cm 5.4pt 0cm 5.4pt;height:25.85pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0cm;text-align:center;
         line-height:normal'>
                                <b><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>BAGIAN
                                        MARKETING</span></b>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width=190 valign=top
                            style='width:142.4pt;border:solid windowtext 1.0pt;
         border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0cm;text-align:center;
         line-height:normal'>
                                <b><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>AO</span></b>
                            </p>
                        </td>
                        <td width=190 rowspan=3 valign=top
                            style='width:142.4pt;border:none;
         border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>
                        </td>
                        <td width=190 valign=top
                            style='width:142.4pt;border-top:none;border-left:
         none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
         padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0cm;text-align:center;
         line-height:normal'>
                                <b><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>KABAG
                                        MKT</span></b>
                            </p>
                        </td>
                    </tr>
                    <tr style='height:83.85pt'>
                        <td width=190 valign=top
                            style='width:142.4pt;border:solid windowtext 1.0pt;
         border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:83.85pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>
                        </td>
                        <td width=190 valign=top
                            style='width:142.4pt;border-top:none;border-left:
         none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
         padding:0cm 5.4pt 0cm 5.4pt;height:83.85pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td width=190 valign=top
                            style='width:142.4pt;border:solid windowtext 1.0pt;
         border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>TGL :
                                        {{ Carbon\Carbon::now()->format('d-m-Y') }}</span></b></p>
                        </td>
                        <td width=190 valign=top
                            style='width:142.4pt;border-top:none;border-left:
         none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
         padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>TGL :</span></b>
                            </p>
                        </td>
                    </tr>
                </table>

                <p class=MsoNormal style='line-height:normal'><span
                        style='font-size:12.0pt;
       font-family:"Times New Roman",serif'>&nbsp;</span></p>

                <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
                    style='border-collapse:collapse;border:none'>
                    <tr style='height:27.45pt'>
                        <td width=570 colspan=3
                            style='width:427.2pt;border:solid windowtext 1.0pt;
         padding:0cm 5.4pt 0cm 5.4pt;height:27.45pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0cm;text-align:center;
         line-height:normal'>
                                <b><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>BAGIAN
                                        RISK</span></b>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width=190 valign=top
                            style='width:142.4pt;border:solid windowtext 1.0pt;
         border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0cm;text-align:center;
         line-height:normal'>
                                <b><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>ADM</span></b>
                            </p>
                        </td>
                        <td width=190 valign=top
                            style='width:142.4pt;border-top:none;border-left:
         none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
         padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0cm;text-align:center;
         line-height:normal'>
                                <b><span style='font-size:12.0pt;font-family:"Times New Roman",serif'>KABAG
                                        RISK</span></b>
                            </p>
                        </td>
                        <td width=190 valign=top
                            style='width:142.4pt;border-top:none;border-left:
         none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
         padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0cm;text-align:center;
         line-height:normal'>
                                <b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>CUSTODIAN</span></b>
                            </p>
                        </td>
                    </tr>
                    <tr style='height:84.75pt'>
                        <td width=190 valign=top
                            style='width:142.4pt;border:solid windowtext 1.0pt;
         border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:84.75pt'>
                            <p class=MsoNormal
                                style='margin-bottom:0cm;text-align:justify;line-height:
         normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>
                        </td>
                        <td width=190 valign=top
                            style='width:142.4pt;border-top:none;border-left:
         none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
         padding:0cm 5.4pt 0cm 5.4pt;height:84.75pt'>
                            <p class=MsoNormal
                                style='margin-bottom:0cm;text-align:justify;line-height:
         normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>
                        </td>
                        <td width=190 valign=top
                            style='width:142.4pt;border-top:none;border-left:
         none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
         padding:0cm 5.4pt 0cm 5.4pt;height:84.75pt'>
                            <p class=MsoNormal
                                style='margin-bottom:0cm;text-align:justify;line-height:
         normal'><span
                                    style='font-size:12.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td width=190 valign=top
                            style='width:142.4pt;border:solid windowtext 1.0pt;
         border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal
                                style='margin-bottom:0cm;text-align:justify;line-height:
         normal'><b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>TGL
                                        :</span></b></p>
                        </td>
                        <td width=190 valign=top
                            style='width:142.4pt;border-top:none;border-left:
         none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
         padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal
                                style='margin-bottom:0cm;text-align:justify;line-height:
         normal'><b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>TGL
                                        :</span></b></p>
                        </td>
                        <td width=190 valign=top
                            style='width:142.4pt;border-top:none;border-left:
         none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
         padding:0cm 5.4pt 0cm 5.4pt'>
                            <p class=MsoNormal
                                style='margin-bottom:0cm;text-align:justify;line-height:
         normal'><b><span
                                        style='font-size:12.0pt;font-family:"Times New Roman",serif'>TGL
                                        :</span></b></p>
                        </td>
                    </tr>
                </table>

                <p class=MsoNormal style='text-align:justify'>&nbsp;</p>

            </div>

            <div class="WordSection2">
                <div class="row">
                    <div class="row col-12">
                        <div class="col-md-6 col-sm-12 col-6 ml-3 ">
                            <img src="../../../logo_form.png" height="50" class="mt-2 mb-2 right-3"
                                alt="logo">
                            {{-- </div>
                        <div class="col-md-6 col-sm-10 col-6 text-end"> --}}
                            <img src="../../../logoib.png" height="50" class="mt-2 mb-2"
                                style="margin-left:550px;" alt="logo">
                        </div>
                    </div>
                </div>

                <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=756
                    style='width:567.05pt;margin-left:13.9pt;border-collapse:collapse;border:none'>
                    <tr style='height:27.55pt'>
                        <td width=756
                            style='width:567.05pt;border:solid windowtext 1.0pt;padding:
         0cm 5.4pt 0cm 5.4pt;height:27.55pt'>
                            <p class=MsoNormal align=center
                                style='margin-bottom:0cm;text-align:center;
         line-height:normal'><b><span
                                        lang=EN-ID
                                        style='font-size:10.0pt;font-family:
         "Times New Roman",serif'>USULAN
                                        {{ $pembiayaan->jenis_pby_ultra_mikro == 'Restruct' ? 'RESTRUCT ' : '' }}PEMBIAYAAN
                                        ULTRA MIKRO</span></b></p>
                        </td>
                    </tr>
                    <tr style='height:729.4pt'>
                        <td width=756 valign=top
                            style='width:567.05pt;border:solid windowtext 1.0pt;
         border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:729.4pt'>
                            <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 align=left
                                style='border-collapse:collapse;border:none;margin-left:6.75pt;margin-right:
          6.75pt'>
                                <tr style='height:13.45pt'>
                                    <td width=185 valign=top
                                        style='width:138.85pt;border:solid windowtext 1.0pt;
           border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:13.45pt'>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b><span
                                                    lang=EN-ID
                                                    style='font-size:10.0pt;font-family:"Times New Roman",serif'>Fasilitas</span></b>
                                        </p>
                                    </td>
                                    <td width=185 valign=top
                                        style='width:138.85pt;border:solid windowtext 1.0pt;
           border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:13.45pt'>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:</span>
                                        </p>
                                    </td>
                                    <td width=370 colspan=2 valign=top
                                        style='width:277.8pt;border:solid windowtext 1.0pt;
           border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:13.45pt'>
                                        <p class=MsoNormal align=center
                                            style='margin-bottom:0cm;text-align:center;
           line-height:normal'>
                                            <b><span lang=EN-ID
                                                    style='font-size:10.0pt;font-family:
           "Times New Roman",serif'></span></b>
                                        </p>
                                    </td>
                                </tr>
                                <tr style='height:48.65pt'>
                                    <td width=185 valign=top
                                        style='width:138.85pt;border-top:none;border-left:
           solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
           none;padding:0cm 5.4pt 0cm 5.4pt;height:48.65pt'>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Tanggal</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Penggunaan</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Jenis
                                                Fasilitas</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Nama
                                                Nasabah</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>No
                                                Telp / Hp</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>No.
                                                KTP</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Tempat
                                                Lahir</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>
                                                Tanggal
                                                Lahir</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Usia</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Alamat</span>
                                        </p>
                                    </td>
                                    <td width=185 valign=top
                                        style='width:138.85pt;border-top:none;border-left:
           none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
           padding:0cm 5.4pt 0cm 5.4pt;height:48.65pt'>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $pembiayaan->tanggal_pengajuan }}</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $pembiayaan->tujuan_pembiayaan }}</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $pembiayaan->akad }}</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $pembiayaan->nasabah->nama_nasabah }}</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $pembiayaan->nasabah->no_hp }}</span></p>

                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $pembiayaan->nasabah->no_ktp }}</span></p>
                                        @php
                                            $tgl = strtotime($pembiayaan->nasabah->tgl_lahir);
                                            $tgl_lahir = Carbon\Carbon::parse($tgl);
                                            $tgl_sekarang = Carbon\Carbon::now();
                                            $umur = $tgl_sekarang->format('Y') - $tgl_lahir->format('Y');
                                        @endphp
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $pembiayaan->nasabah->tempat_lahir }}</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ strftime('%d-%m-%Y', strtotime($pembiayaan->nasabah->tgl_lahir)) }}</span>
                                        </p>

                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $umur }} Tahun</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $pembiayaan->nasabah->alamat_domisili }}
                                        </p>

                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                    </td>
                                    <td width=185 valign=top
                                        style='width:138.9pt;border:none;border-bottom:
           solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:48.65pt'>

                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Pekerjaan/Usaha</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Pendapatan</span>
                                        </p>

                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Pengeluaran</span>
                                        </p>

                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Sisa
                                                Pendapatan Bersih</span>
                                        </p>
                                    </td>
                                    <td width=185 valign=top
                                        style='width:138.9pt;border-top:none;border-left:
           none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
           padding:0cm 5.4pt 0cm 5.4pt;height:48.65pt'>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ strtoupper($pembiayaan->nasabah->nama_pekerjaan) }}</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                Rp{{ number_format($pembiayaan->penghasilan, 0, ',', '.') }}</span></p>

                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                Rp{{ number_format($pembiayaan->pengeluaran, 0, ',', '.') }}</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                Rp {{ number_format($pendapatanBersih, 0, ',', '.') }}
                                            </span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                    </td>
                                </tr>

                                <tr style='height:63.25pt'>
                                    <td width=185 valign=top
                                        style='width:138.85pt;border-top:none;border-left:
           solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
           none;padding:0cm 5.4pt 0cm 5.4pt;height:63.25pt'>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Jenis
                                                Fasilitas Pembiayaan</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Penggunaan</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Harga
                                                Beli</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Jangka
                                                Waktu</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>Angsuran</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>DSR</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b><span
                                                    lang=EN-ID
                                                    style='font-size:10.0pt;font-family:"Times New Roman",serif'>Catatan</span></b>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b><span
                                                    lang=EN-ID
                                                    style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span></b>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                    </td>
                                    <td width=556 colspan=3 valign=top
                                        style='width:416.65pt;border-top:none;
           border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
           padding:0cm 5.4pt 0cm 5.4pt;height:63.25pt'>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $pembiayaan->akad }}</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $pembiayaan->tujuan_pembiayaan }}</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                Rp{{ number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.') }}</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $tenor }} Bulan</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                Rp{{ number_format($angsuran, 0, ',', '.') }}/Bulan</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:
                                                {{ $dsr }} %</span></p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>:</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                    </td>
                                </tr>
                                <tr style='height:10.95pt'>
                                    <td width=185 valign=top
                                        style='width:138.85pt;border:solid windowtext 1.0pt;
           border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:10.95pt'>
                                        <p class=MsoNormal align=center
                                            style='margin-bottom:0cm;text-align:center;
           line-height:normal'>
                                            <b><span lang=EN-ID
                                                    style='font-size:10.0pt;font-family:
           "Times New Roman",serif'>Diajukan
                                                    AO</span></b>
                                        </p>
                                    </td>
                                    <td width=185 valign=top
                                        style='width:138.9pt;border-top:none;border-left:
           none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
           padding:0cm 5.4pt 0cm 5.4pt;height:10.95pt'>
                                        <p class=MsoNormal align=center
                                            style='margin-bottom:0cm;text-align:center;
           line-height:normal'>
                                            <b><span lang=EN-ID
                                                    style='font-size:10.0pt;font-family:
           "Times New Roman",serif'>Kabag
                                                    Marketing</span></b>
                                        </p>
                                    </td>
                                    <td width=185 valign=top
                                        style='width:138.85pt;border-top:none;border-left:
           none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
           padding:0cm 5.4pt 0cm 5.4pt;height:10.95pt'>
                                        <p class=MsoNormal align=center
                                            style='margin-bottom:0cm;text-align:center;
           line-height:normal'>
                                            <b><span lang=EN-ID
                                                    style='font-size:10.0pt;font-family:
           "Times New Roman",serif'>Analis</span></b>
                                        </p>
                                    </td>
                                    {{-- <td width=185 valign=top
                                        style='width:138.9pt;border-top:none;border-left:
           none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
           padding:0cm 5.4pt 0cm 5.4pt;height:10.95pt'>
                                        <p class=MsoNormal align=center
                                            style='margin-bottom:0cm;text-align:center;
           line-height:normal'>
                                            <b><span lang=EN-ID
                                                    style='font-size:10.0pt;font-family:
           "Times New Roman",serif'>Direktur
                                                    Bisnis</span></b>
                                        </p>
                                    </td> --}}
                                </tr>
                                <tr style='height:63.25pt'>
                                    <td width=185 valign=top
                                        style='width:138.85pt;border:solid windowtext 1.0pt;
           border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:63.25pt'>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                    </td>
                                    <td width=185 valign=top
                                        style='width:138.9pt;border-top:none;border-left:
           none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
           padding:0cm 5.4pt 0cm 5.4pt;height:63.25pt'>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                    </td>
                                    <td width=185 valign=top
                                        style='width:138.85pt;border-top:none;border-left:
           none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
           padding:0cm 5.4pt 0cm 5.4pt;height:63.25pt'>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                    </td>
                                    {{-- <td width=185 valign=top
                                        style='width:138.9pt;border-top:none;border-left:
           none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
           padding:0cm 5.4pt 0cm 5.4pt;height:63.25pt'>
                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                        </p>
                                    </td> --}}
                                </tr>
                                <tr>
                                    <td width=185 valign=top style='width:138.85pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;text-align:center;'>
                                        <span style='font-size:9.0pt;font-family:"Times New Roman",serif'>{{ $namaAO }}</span>
                                    </td>
                                    <td width=185 valign=top style='width:138.9pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;text-align:center;'>
                                        <span style='font-size:9.0pt;font-family:"Times New Roman",serif'>{{ $namaKabag }}</span>
                                    </td>
                                    <td width=185 valign=top style='width:138.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;text-align:center;'>
                                        <span style='font-size:9.0pt;font-family:"Times New Roman",serif'>{{ $namaAnalis }}</span>
                                    </td>
                                </tr>
                            </table>
                            <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'></p>

                            {{-- Catatan Approval --}}
                            {{-- <table style='border-collapse:collapse;border:none;margin-left:6.75pt;margin-right:6.75pt'>

                                <tr style='height:13.45pt'>
                                    <td valign=top
                                        style='border-right:none;padding:0cm 5.4pt 0cm 5.4pt;height:13.45pt'>

                                        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                                                lang=EN-ID
                                                style='font-size:10.0pt;font-family:"Times New Roman",serif'>
                                                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>
                                                    <span lang=EN-ID
                                                        style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                                </p>
                                                <b>Catatan Komite :</b>
                                                <br />

                                                @foreach ($catatanApprovals as $catatanApproval)
                                                    <b>{{ $catatanApproval->statushistory->keterangan }}
                                                        {{ $catatanApproval->jabatan->keterangan }}</b>
                                                    <br />
                                                    {!! nl2br($catatanApproval->catatan) !!}
                                                    <br />
                                                    <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'>
                                                        <span lang=EN-ID
                                                            style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                                                    </p>
                                                @endforeach
                                            </span>
                                        </p>
                                    </td>

                                </tr>
                            </table> --}}
                        </td>

                    </tr>
                </table>

                {{-- <div class="WordSection3">
                    <div class="row">
                        <div class="row col-12">
                            <div class="col-md-6 col-sm-12 col-6 ml-3 ">
                                <img src="../../../logo_form.png" height="50" class="mt-2 mb-2 right-3"
                                    alt="logo">
                                <img src="../../../logoib.png" height="50" class="mt-2 mb-2"
                                    style="margin-left:550px;" alt="logo">
                            </div>
                        </div>
                    </div> --}}

                {{-- <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=756
                        style='width:567.05pt;margin-left:13.9pt;border-collapse:collapse;border:none'>
                        <tr style='height:27.55pt'>
                            <td width=756
                                style='width:567.05pt;border:solid windowtext 1.0pt;padding:
             0cm 5.4pt 0cm 5.4pt;height:27.55pt'>
                                <p class=MsoNormal align=center
                                    style='margin-bottom:0cm;text-align:center;
             line-height:normal'>
                                    <b><span lang=EN-ID
                                            style='font-size:10.0pt;font-family:
             "Times New Roman",serif'>USULAN
                                            PEMBIAYAAN Ultra Mikro</span></b>
                                </p>
                            </td>
                        </tr>
                        <tr style='height:729.4pt'>
                            <td width=756 valign=top
                                style='width:567.05pt;border:solid windowtext 1.0pt;
             border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:729.4pt'>
                                <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 align=left
                                    style='border-collapse:collapse;border:none;margin-left:6.75pt;margin-right:
              6.75pt'>
                                    <tr style='height:48.65pt'>
                                        <td width=370 valign=top
                                            style='width:277.7pt;border-top:none;border-left:
               solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
               none;padding:0cm 5.4pt 0cm 5.4pt;height:48.65pt'>
                                            <div class="user-avatar-section">
                                                <div class="d-flex align-items-center flex-column">
                                                    <img class="img-fluid rounded mb-75"
                                                        src="{{ asset('storage/' . $fotoKtp->foto) }}" height="300"
                                                        width="300" alt="avatar img" />
                                                    <div class="user-info text-center">
                                                        <h4>{{ $nasabah->nama_nasabah }}</h4>
                                                        <span
                                                            class="badge bg-light-secondary">{{ $nasabah->no_ktp }}</span>
                </div>
            </div>
        </div>
        </td>


        </tr>

        <tr style='height:10.95pt'>
            <td width=185 valign=top
                style='width:138.85pt;border:solid windowtext 1.0pt;
               border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:10.95pt'>
                <p class=MsoNormal align=center
                    style='margin-bottom:0cm;text-align:center;
               line-height:normal'>
                    <b><span lang=EN-ID
                            style='font-size:10.0pt;font-family:
               "Times New Roman",serif'>Diajukan
                            AO</span></b>
                </p>
            </td>
            <td width=185 valign=top
                style='width:138.9pt;border-top:none;border-left:
               none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
               padding:0cm 5.4pt 0cm 5.4pt;height:10.95pt'>
                <p class=MsoNormal align=center
                    style='margin-bottom:0cm;text-align:center;
               line-height:normal'>
                    <b><span lang=EN-ID
                            style='font-size:10.0pt;font-family:
               "Times New Roman",serif'>Kabag
                            Marketing</span></b>
                </p>
            </td>
            <td width=185 valign=top
                style='width:138.85pt;border-top:none;border-left:
               none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
               padding:0cm 5.4pt 0cm 5.4pt;height:10.95pt'>
                <p class=MsoNormal align=center
                    style='margin-bottom:0cm;text-align:center;
               line-height:normal'>
                    <b><span lang=EN-ID
                            style='font-size:10.0pt;font-family:
               "Times New Roman",serif'>Analis</span></b>
                </p>
            </td>
            <td width=185 valign=top
                style='width:138.9pt;border-top:none;border-left:
               none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
               padding:0cm 5.4pt 0cm 5.4pt;height:10.95pt'>
                <p class=MsoNormal align=center
                    style='margin-bottom:0cm;text-align:center;
               line-height:normal'>
                    <b><span lang=EN-ID
                            style='font-size:10.0pt;font-family:
               "Times New Roman",serif'>Direktur
                            Bisnis</span></b>
                </p>
            </td>
        </tr>
        <tr style='height:63.25pt'>
            <td width=185 valign=top
                style='width:138.85pt;border:solid windowtext 1.0pt;
               border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:63.25pt'>
                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span lang=EN-ID
                        style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                </p>
            </td>
            <td width=185 valign=top
                style='width:138.9pt;border-top:none;border-left:
               none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
               padding:0cm 5.4pt 0cm 5.4pt;height:63.25pt'>
                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span lang=EN-ID
                        style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                </p>
            </td>
            <td width=185 valign=top
                style='width:138.85pt;border-top:none;border-left:
               none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
               padding:0cm 5.4pt 0cm 5.4pt;height:63.25pt'>
                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span lang=EN-ID
                        style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                </p>
            </td>
            <td width=185 valign=top
                style='width:138.9pt;border-top:none;border-left:
               none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
               padding:0cm 5.4pt 0cm 5.4pt;height:63.25pt'>
                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span lang=EN-ID
                        style='font-size:10.0pt;font-family:"Times New Roman",serif'>&nbsp;</span>
                </p>
            </td>
        </tr>

        </table>
        <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'></p>
        </td>
        </tr>
        </table> --}}

                <p class=MsoNormal><span lang=EN-ID
                        style='font-size:10.0pt;line-height:107%;
       font-family:"Times New Roman",serif'>&nbsp;</span>
                </p>

            </div>


            <!-- BEGIN: Vendor JS-->
            <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
            <!-- BEGIN Vendor JS-->

            <!-- BEGIN: Page Vendor JS-->
            <!-- END: Page Vendor JS-->

            <!-- BEGIN: Theme JS-->
            <script src="{{ asset('app-assets/js/core/app-menu.min.js') }}"></script>
            <script src="{{ asset('app-assets/js/core/app.min.js') }}"></script>
            <!-- END: Theme JS-->

            <!-- BEGIN: Page JS-->
            <script src="{{ asset('app-assets/js/scripts/pages/app-invoice-print.min.js') }}"></script>
            <!-- END: Page JS-->

            <script>
                $(window).on('load', function() {
                    if (feather) {
                        feather.replace({
                            width: 14,
                            height: 14
                        });
                    }
                })
            </script>
</body>
<!-- END: Body-->

</html>
