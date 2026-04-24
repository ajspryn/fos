<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cetak Proposal SKPD - {{ Auth::user()->name ?? 'User' }}</title>
    <style>
        @page { size: A4 portrait; margin: 8mm; }
        body { margin:0; padding:0; font-family: "Times New Roman", serif; color:#000; }
        .print-sheet { box-sizing:border-box; max-width:210mm; margin:0 auto; padding:4mm; }
        .header { display:flex; justify-content:space-between; align-items:center; }
        .header img { height:48px; }
        .section { margin-bottom:6px; font-size:10.5pt; }
        .table { width:100%; border-collapse:collapse; table-layout:fixed; }
        .table td, .table th { border:1px solid #222; padding:4px 6px; vertical-align:top; word-wrap:break-word; }
        .table.small td, .table.small th { font-size:10pt; }
        .label { width:32%; font-weight:600; padding-right:6px; }
        .value { width:68%; word-break:break-word; }
        .avoid-break { page-break-inside:avoid; break-inside:avoid; }
        .disposisi-header { text-align:center; font-weight:700; padding:8px 6px; font-size:12pt; border:2px solid #000; display:block; }
        .idep-table { width:100%; border-collapse:collapse; font-size:9pt; }
        .idep-table td, .idep-table th { border:1px solid #222; padding:3px 4px; text-align:center; vertical-align:top; }
        .idep-table th { font-weight:700; }
        @media print { .no-print { display:none !important; } }
    </style>
</head>
<body>
<main class="print-sheet">
    @php
        $formatAddress = function ($source, $streetField = 'alamat') {
            $parts = [];

            $street = trim((string) data_get($source, $streetField, ''));
            if ($street !== '') {
                $parts[] = $street;
            }

            $rt = trim((string) data_get($source, 'rt', ''));
            $rw = trim((string) data_get($source, 'rw', ''));
            if ($rt !== '' || $rw !== '') {
                $parts[] = 'RT ' . ($rt !== '' ? $rt : '-') . '/RW ' . ($rw !== '' ? $rw : '-');
            }

            foreach (['desa_kelurahan', 'kelurahan', 'desa', 'kecamatan', 'kabkota', 'kabupaten', 'kota', 'provinsi'] as $field) {
                $value = trim((string) data_get($source, $field, ''));
                if ($value !== '' && !in_array($value, $parts, true)) {
                    $parts[] = $value;
                }
            }

            $postalCode = trim((string) (data_get($source, 'kode_pos') ?? data_get($source, 'kodepos') ?? ''));
            if ($postalCode !== '') {
                $parts[] = 'Kode Pos ' . $postalCode;
            }

            return !empty($parts) ? implode(', ', $parts) : '-';
        };
    @endphp

    <header class="header">
        <div><img src="{{ asset('logo.png') }}" alt="logo-left"></div>
        <div style="text-align:right"><img src="{{ asset('logoib.png') }}" alt="logo-right"></div>
    </header>

    <section class="section avoid-break" style="margin-top:4mm;">
        <div class="disposisi-header">DISPOSISI BERKAS PEMBIAYAAN</div>
        <table class="table" style="margin-top:6px;">
            <tr>
                <td class="label">Nama Calon Nasabah</td>
                <td class="value">{{ $pembiayaan->nasabah->nama_nasabah ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Instansi</td>
                <td class="value">{{ optional($pembiayaan->instansi)->nama_instansi ?? ($pembiayaan->jabatan ?? '-') }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan / Jabatan</td>
                <td class="value">{{ $pembiayaan->jabatan ?? ('Golongan ' . (optional($pembiayaan->golongan)->nama_golongan ?? '-')) }}</td>
            </tr>
            <tr>
                <td class="label">Segmen</td>
                <td class="value">SKPD</td>
            </tr>
            <tr>
                <td class="label">Produk</td>
                <td class="value">Pembiayaan Multi Guna</td>
            </tr>
            <tr>
                <td class="label">Plafond</td>
                <td class="value">Rp{{ number_format((float)str_replace('.', '', $pembiayaan->nominal_pembiayaan ?? '0'), 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="label">Margin</td>
                <td class="value">{{ number_format((float)($pembiayaan->rate ?? 0), 2, ',', '.') }} %</td>
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
                <td colspan="3" style="border:1px solid #222;text-align:center;font-weight:700;padding:8px;">BAGIAN MARKETING</td>
            </tr>
            <tr>
                <td style="width:35%;border:1px solid #222;vertical-align:top;padding:6px;">
                    <div style="text-align:center;font-weight:700">AO</div>
                    <div style="height:80px;"></div>
                    <div style="border-top:1px solid #222;padding-top:4px;text-align:center;font-size:9pt;">{{ $namaAO }}</div>
                    <div style="font-weight:700;text-align:left;padding-top:2px;">TGL : {{ \Carbon\Carbon::now()->format('d-m-Y') }}</div>
                </td>
                <td style="width:30%;border:1px solid #222;vertical-align:top;padding:6px;">
                    <div style="height:120px;"></div>
                </td>
                <td style="width:35%;border:1px solid #222;vertical-align:top;padding:6px;">
                    <div style="text-align:center;font-weight:700">KABAG MKT</div>
                    <div style="height:80px;"></div>
                    <div style="border-top:1px solid #222;padding-top:4px;text-align:center;font-size:9pt;">{{ $namaKabag }}</div>
                    <div style="font-weight:700;text-align:left;padding-top:2px;">TGL : </div>
                </td>
            </tr>
            <tr><td colspan="3" style="height:10mm;border:none"></td></tr>
            <tr>
                <td colspan="3" style="border:1px solid #222;text-align:center;font-weight:700;padding:8px;">BAGIAN RISK</td>
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

    <div style="page-break-before:always;">
        <header class="header">
            <div><img src="{{ asset('logo.png') }}" alt="logo-left"></div>
            <div style="text-align:right"><img src="{{ asset('logoib.png') }}" alt="logo-right"></div>
        </header>

        <section class="section avoid-break">
            <div class="disposisi-header">USULAN PEMBIAYAAN SKPD</div>
            <table class="table small" style="margin-top:6px;">
                <tr>
                    <td class="label">Tanggal</td>
                    <td class="value">{{ $pembiayaan->tanggal_pengajuan ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Penggunaan</td>
                    <td class="value">{{ optional($pembiayaan->jenis_penggunaan)->jenis_penggunaan ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Jenis Fasilitas</td>
                    <td class="value">{{ optional($pembiayaan->akad)->nama_akad ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Nama Nasabah</td>
                    <td class="value">{{ $pembiayaan->nasabah->nama_nasabah ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">No Telp / Hp</td>
                    <td class="value">{{ $pembiayaan->nasabah->no_telp ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Tlp Tdk Serumah</td>
                    <td class="value">{{ optional($pembiayaan->nasabah->orang_terdekat)->no_telp_orang_terdekat ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td class="value">{{ $formatAddress($pembiayaan->nasabah) }}</td>
                </tr>
                <tr>
                    <td class="label">Wilayah</td>
                    <td class="value">{{ implode(', ', array_filter([$pembiayaan->nasabah->desa_kelurahan ?? null, $pembiayaan->nasabah->kecamatan ?? null, $pembiayaan->nasabah->kabkota ?? null, $pembiayaan->nasabah->provinsi ?? null])) ?: '-' }}</td>
                </tr>
                <tr>
                    <td class="label">No. KTP</td>
                    <td class="value">{{ $pembiayaan->nasabah->no_ktp ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Tempat, Tgl Lahir</td>
                    <td class="value">{{ $pembiayaan->nasabah->tempat_lahir ?? '-' }}, {{ !empty($pembiayaan->nasabah->tgl_lahir) ? \Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Usia</td>
                    <td class="value">
                        @php
                            $umur = !empty($pembiayaan->nasabah->tgl_lahir) ? \Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir)->age : '-';
                        @endphp
                        {{ $umur }} Tahun
                    </td>
                </tr>
                <tr>
                    <td class="label">Dinas / Instansi</td>
                    <td class="value">{{ optional($pembiayaan->instansi)->nama_instansi ?? '-' }}</td>
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
                                <td class="label">Gaji Nasabah</td>
                                <td class="value">Rp{{ number_format((float)str_replace('.', '', $pembiayaan->gaji_pokok ?? '0'), 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="label">Gaji/Pend. Suami/Istri</td>
                                <td class="value">Rp{{ number_format((float)str_replace('.', '', $pembiayaan->pendapatan_lainnya ?? '0'), 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="label">Pendapatan TPP</td>
                                <td class="value">Rp{{ number_format((float)str_replace('.', '', $pembiayaan->gaji_tpp ?? '0'), 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="label" style="font-weight:700">Jumlah Pendapatan</td>
                                <td class="value">Rp{{ number_format($total_pendapatan ?? 0, 0, ',', '.') }}</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:50%;vertical-align:top;padding-left:6px;">
                        <div style="font-weight:700;margin-bottom:6px">Pengeluaran</div>
                        <table class="table small">
                            <tr>
                                <td class="label">Cicilan Bank</td>
                                <td class="value">Rp{{ number_format($cicilan ?? 0, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="label">Potongan Lainnya</td>
                                <td class="value">Rp{{ number_format((float)str_replace('.', '', $pembiayaan->pengeluaran_lainnya ?? '0'), 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="label">Kebutuhan Keluarga</td>
                                <td class="value">Rp{{ number_format($biayakeluarga ?? 0, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="label" style="font-weight:700">Jumlah Pengeluaran</td>
                                <td class="value">Rp{{ number_format($total_pengeluaran ?? 0, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td class="label" style="font-weight:700">Sisa Pendapatan Bersih</td>
                                <td class="value">Rp{{ number_format($pendapatan_bersih ?? 0, 0, ',', '.') }}</td>
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
                    <td class="label">Jenis Fasilitas</td>
                    <td class="value">{{ optional($pembiayaan->akad)->nama_akad ?? '-' }}</td>
                    <td class="label">Kegunaan</td>
                    <td class="value">{{ optional($pembiayaan->jenis_penggunaan)->jenis_penggunaan ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Harga Beli</td>
                    <td class="value">Rp{{ number_format((float)str_replace('.', '', $pembiayaan->nominal_pembiayaan ?? '0'), 0, ',', '.') }}</td>
                    <td class="label">Harga Jual</td>
                    <td class="value">Rp{{ number_format($harga_jual ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="label">Jangka Waktu</td>
                    <td class="value">{{ $tenor ?? '-' }} Bulan</td>
                    <td class="label">Equivalen Rate</td>
                    <td class="value">{{ number_format((float)($pembiayaan->rate ?? 0), 2, ',', '.') }} %</td>
                </tr>
                <tr>
                    <td class="label">Angsuran</td>
                    <td class="value">Rp{{ number_format($angsuran1 ?? 0, 0, ',', '.') }}/Bulan</td>
                    <td class="label">Jaminan</td>
                    <td class="value">{{ optional($jaminan)->nama_jaminan ?? 'SK Pengangkatan/Terakhir' }}</td>
                </tr>
                <tr>
                    <td class="label">Rasio DSR</td>
                    <td class="value" colspan="3">{{ $nilai_dsr1 ?? '-' }} %</td>
                </tr>
            </table>
        </section>

        <section class="section avoid-break">
            <div style="font-weight:700;margin-bottom:4px">Informasi Debitur (IDEB/SLIK)</div>
            <table class="idep-table">
                <tr>
                    <th>No</th><th>Bank / LK</th><th>Plafond</th><th>Outstanding</th>
                    <th>Tenor</th><th>Margin</th><th>Angsuran</th><th>Agunan</th><th>Kol Tertinggi</th>
                </tr>
                @forelse($ideps as $idep)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="text-align:left">{{ $idep->nama_bank }}</td>
                    <td>Rp{{ number_format($idep->plafond ?? 0, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($idep->outstanding ?? 0, 0, ',', '.') }}</td>
                    <td>{{ $idep->tenor }}</td>
                    <td>{{ number_format($idep->margin ?? 0, 0, ',', '.') }}%</td>
                    <td>Rp{{ number_format($idep->angsuran ?? 0, 0, ',', '.') }}</td>
                    <td>{{ $idep->agunan }}</td>
                    <td>{{ $idep->kol_tertinggi }}</td>
                </tr>
                @empty
                <tr><td colspan="9" style="text-align:center">-</td></tr>
                @endforelse
            </table>
        </section>

        @if($cekcicilanpasangan > 0)
        <section class="section avoid-break">
            <div style="font-weight:700;margin-bottom:4px">Informasi Debitur Pasangan</div>
            <table class="idep-table">
                <tr>
                    <th>No</th><th>Bank / LK</th><th>Plafond</th><th>Outstanding</th>
                    <th>Tenor</th><th>Margin</th><th>Angsuran</th><th>Agunan</th><th>Kol Tertinggi</th>
                </tr>
                @foreach($ideppasangans as $ideppasangan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="text-align:left">{{ $ideppasangan->nama_bank }}</td>
                    <td>Rp{{ number_format($ideppasangan->plafond ?? 0, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($ideppasangan->outstanding ?? 0, 0, ',', '.') }}</td>
                    <td>{{ $ideppasangan->tenor }}</td>
                    <td>{{ number_format($ideppasangan->margin ?? 0, 0, ',', '.') }}%</td>
                    <td>Rp{{ number_format($ideppasangan->angsuran ?? 0, 0, ',', '.') }}</td>
                    <td>{{ $ideppasangan->agunan }}</td>
                    <td>{{ $ideppasangan->kol_tertinggi }}</td>
                </tr>
                @endforeach
            </table>
        </section>
        @endif

        @if(!empty($catatanApprovals) && count($catatanApprovals))
        <section class="section avoid-break">
            <div style="font-weight:700;margin-bottom:6px">Catatan Komite</div>
            @foreach($catatanApprovals as $note)
                <div style="margin-bottom:8px;">
                    <div style="font-weight:700">{{ optional($note->statushistory)->keterangan }} - {{ optional($note->jabatan)->keterangan }}</div>
                    <div style="white-space:pre-wrap;">{!! nl2br(e($note->catatan)) !!}</div>
                </div>
            @endforeach
        </section>
        @endif

        <section class="section avoid-break">
            <table class="table" style="margin-top:8px;">
                <tr>
                    <td style="width:33.33%;text-align:center;font-weight:700;padding:6px;">Diajukan AO</td>
                    <td style="width:33.33%;text-align:center;font-weight:700;padding:6px;">Kabag Marketing</td>
                    <td style="width:33.33%;text-align:center;font-weight:700;padding:6px;">Analis</td>
                </tr>
                <tr>
                    <td style="height:88px;padding:6px;"></td>
                    <td style="height:88px;padding:6px;"></td>
                    <td style="height:88px;padding:6px;"></td>
                </tr>
                <tr>
                    <td style="text-align:left;padding:4px 6px;font-weight:700;">TGL : </td>
                    <td style="text-align:left;padding:4px 6px;font-weight:700;">TGL : </td>
                    <td style="text-align:left;padding:4px 6px;font-weight:700;">TGL : </td>
                </tr>
                <tr>
                    <td style="text-align:center;padding:4px 6px;font-size:9pt;">{{ $namaAO }}</td>
                    <td style="text-align:center;padding:4px 6px;font-size:9pt;">{{ $namaKabag }}</td>
                    <td style="text-align:center;padding:4px 6px;font-size:9pt;">{{ $namaAnalis }}</td>
                </tr>
            </table>
        </section>

        <footer class="small no-print" style="margin-top:8mm">Dicetak dari Aplikasi FOS BPRS BTB oleh: {{ Auth::user()->name ?? '-' }} pada {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</footer>
    </div>

</main>
<script>
    try {
        if (new URLSearchParams(location.search).get('print') === '1') {
            window.addEventListener('load', function() { setTimeout(function(){ window.print(); }, 200); });
        }
    } catch(e) { console.error('auto-print error', e); }
</script>
</body>
</html>
