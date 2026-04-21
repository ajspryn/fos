<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cetak Proposal P3K - {{ Auth::user()->name ?? 'User' }}</title>
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
                <div class="title">USULAN PEMBIAYAAN P3K</div>
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
                    <td class="value">P3K / Rp{{ number_format($pembiayaan->nominal_pembiayaan ?? 0,0,',','.') }}</td>
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
