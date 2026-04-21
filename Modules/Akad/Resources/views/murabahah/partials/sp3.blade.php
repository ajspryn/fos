<p class=MsoNormal style='text-align:justify;text-autospace:none'><span
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'><span lang=EN-US>Cibinong,
        </span></span><span lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>
        {{ strftime('%d %B %Y', strtotime($registerAkad->tgl_akad)) }}</span></p>

<p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'></span></p>
<br />
<p class=MsoNormal align=center style='text-align:center;text-autospace:none'><b><u><span lang=EN-US
                style='font-family:"Ottawa",sans-serif;text-transform:uppercase'>Surat
                Prinsip Persetujuan Pembiayaan (SP3) *</span></u></b></p>

<p class=MsoNormal align=center style='text-align:center'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>No. </span><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $registerAkad->no_akad }}</span><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>/BTB/SP3/</span><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $bulanRomawi }}</span><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>-</span><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $tahun }}</span></p>
<br />

<p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Kepada Yth
        :</span></p>

<p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Bapak/Ibu/Saudara/i</span></p>

<p class=MsoNormal style='text-align:justify;text-autospace:none'><b><span lang=EN-US
            style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($nasabah->nama_nasabah)) }}</span></b>
</p>

<p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Di</span></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 style='border-collapse:collapse;border:none'>
    <tr>
        <td width=385 valign=top style='width:288.9pt;padding:0cm 5.4pt 0cm 0cm'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><b><span lang=EN-US
                        style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($nasabah->alamat)) }}</span></b><b><span
                        lang=EN-US style='font-size:10.0pt;font-family:
      "Ottawa",sans-serif'>, RT
                    </span></b><b><span lang=EN-US
                        style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>{{ $nasabah->rt }}</span></b><b><span
                        lang=EN-US style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>/RW </span></b><b><span
                        lang=EN-US
                        style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>{{ $nasabah->rw }}</span></b><b><span
                        lang=EN-US style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>,</span></b></p>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><b><span lang=IN
                        style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>Kel. </span></b><b><span lang=EN-US
                        style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($nasabah->desa_kelurahan)) }}</span></b><b><span
                        lang=EN-US style='font-size:10.0pt;font-family:
      "Ottawa",sans-serif'>, Kec.
                    </span></b><b><span lang=EN-US
                        style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($nasabah->kecamatan)) }}</span></b><b><span
                        lang=EN-US style='font-size:10.0pt;font-family:
      "Ottawa",sans-serif'>, </span></b><b><span
                        lang=EN-US
                        style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($nasabah->kabkota)) }}</span></b>
            </p>
        </td>
    </tr>
</table>

<p class=MsoNormal align=center style='text-align:center;text-autospace:none'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>

<br />

<p class=MsoNormal style='margin-bottom:6.0pt;text-align:justify;text-autospace:
    none'><i><span lang=EN-US
            style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Assalamu'alaikum
            Warahmatullahi Wabarakatuh</span></i></p>

<p class=MsoNormal style='margin-bottom:6.0pt;text-align:justify;text-autospace:
    none'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Salam
        sejahtera kami sampaikan semoga senantiasa berada dalam lindungan Allah SWT.
        Sholawat serta salam semoga tercurah atas Rasulullah </span><span lang=AR-SA dir=RTL
        style='font-size:11.0pt'>&#65018;</span><span dir=LTR></span><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'><span dir=LTR></span> beserta keluarga dan para
        sahabatnya serta para pengikutnya
        yang tetap istiqomah dalam meneruskan risalahnya. </span></p>

<p class=MsoNormal style='margin-top:6.0pt;text-align:justify'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Menindak
        lanjuti permohonan pembiayaan yang diajukan kepada Bank BPRS Bogor Tegar
        Beriman pada prinsipnya Bank BPRS Bogor Tegar Beriman menyetujui permohonan
        pembiayaan tersebut dengan syarat dan ketentuan sebagai berikut:</span></p>

<br />

<p class=MsoNormal style='text-align:justify;text-autospace:none'><b><u><span lang=EN-US
                style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>A. <span
                    style='text-transform:uppercase'>Struktur Pembiayaan :</span></span></u></b></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
    style='margin-left:10.0pt;border-collapse:collapse;border:none'>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Plafond
                    Pembiayaan</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-align:justify;text-autospace:
      none'><b><span
                        lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></b></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->plafond, 0, ',', '.') }}</span></b><b><span
                        lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></b></p>
        </td>
    </tr>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Skim Pembiayaan</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=161 colspan=2 valign=top style='width:120.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $pembiayaan->akad }}</span></p>
        </td>
    </tr>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Jenis
                    Produk</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=161 colspan=2 valign=top style='width:120.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $registerAkad->jenis_produk }}</span>
            </p>
        </td>
    </tr>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Tujuan
                    Pembiayaan</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=161 colspan=2 valign=top style='width:120.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $pembiayaan->jenis_penggunaan }}</span>
            </p>
        </td>
    </tr>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Harga
                    Pokok Bank</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-align:justify;text-autospace:
      none'><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->plafond, 0, ',', '.') }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></p>
        </td>
    </tr>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Margin/Ujrah/Fee
                    Bank</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-align:justify;text-autospace:
      none'><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->margin, 0, ',', '.') }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></p>
        </td>
    </tr>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Harga
                    Jual Bank</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-align:justify;text-autospace:
      none'><b><span
                        lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></b></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->harga_jual, 0, ',', '.') }}</span></b><b><span
                        lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></b></p>
        </td>
    </tr>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-align:justify;text-autospace:
      none'><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
    </tr>
</table>

<p class=MsoNormal style='text-align:justify;text-autospace:none'><b><u><span lang=EN-US
                style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>B. <span
                    style='text-transform:uppercase'>Biaya-Biaya :</span></span></u></b></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
    style='margin-left:10.0pt;border-collapse:collapse;border:none'>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Biaya
                    Administrasi</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-align:justify;text-autospace:
      none'><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->by_adm, 0, ',', '.') }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></p>
        </td>
        <td style='border:none;padding:0cm 0cm 0cm 0cm' width=16>
            <p class='MsoNormal'>&nbsp;
        </td>
    </tr>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Biaya
                    Asuransi Jiwa </span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->asuransi->biaya_asuransi_jiwa, 0, ',', '.') }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></p>
        </td>
        <td style='border:none;padding:0cm 0cm 0cm 0cm' width=16>
            <p class='MsoNormal'>&nbsp;
        </td>
    </tr>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Biaya
                    Asuransi Kendaraan</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->asuransi->biaya_asuransi_kendaraan, 0, ',', '.') }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></p>
        </td>
        <td style='border:none;padding:0cm 0cm 0cm 0cm' width=16>
            <p class='MsoNormal'>&nbsp;
        </td>
    </tr>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Biaya
                    Pengikatan Notariil</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->by_notaris, 0, ',', '.') }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></p>
        </td>
        <td style='border:none;padding:0cm 0cm 0cm 0cm' width=16>
            <p class='MsoNormal'>&nbsp;
        </td>
    </tr>
    <tr style='height:13.1pt'>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:13.1pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Hold Dana
                    Biaya Adm Tabungan</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:13.1pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:13.1pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:13.1pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->by_adm_tab, 0, ',', '.') }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></p>
        </td>
        <td width=16 valign=top style='width:11.8pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:13.1pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
    </tr>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>DP Murni
                </span></p>
        </td>
        <td width=19 valign=top
            style='width:14.15pt;border:none;border-bottom:solid windowtext 1.0pt;
      padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top
            style='width:21.25pt;border:none;border-bottom:solid windowtext 1.0pt;
      padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></p>
        </td>
        <td width=132 valign=top
            style='width:99.25pt;border:none;border-bottom:solid windowtext 1.0pt;
      padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'>0<span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-
                </span></p>
        </td>
        <td width=16 valign=top
            style='width:11.8pt;border:none;border-bottom:solid windowtext 1.0pt;
      padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>+</span></p>
        </td>
    </tr>
    <tr style='height:21.8pt'>
        <td width=236 style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.8pt'>
            <p class=MsoNormal style='text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Total Biaya</span></b></p>
        </td>
        <td width=19 style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.8pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></b></p>
        </td>
        <td width=28 style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.8pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></b></p>
        </td>
        <td width=132 style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt;height:21.8pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->by_sp3, 0, ',', '.') }}</span></b><b><span
                        lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></b></p>
        </td>
        <td style='border:none;padding:0cm 0cm 0cm 0cm' width=16>
            <p class='MsoNormal'>&nbsp;
        </td>
    </tr>
</table>

<p class=MsoNormal style='margin-left:14.2pt;text-align:justify;text-autospace:
    none'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify;text-autospace:none'><b><u><span lang=EN-US
                style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>C. <span
                    style='text-transform:uppercase'>Pembayaran :</span></span></u></b></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
    style='margin-left:10.0pt;border-collapse:collapse;border:none'>
    <tr>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Jangka
                    Waktu Pembiayaan</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-align:justify;text-autospace:
      none'><span
                    lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $registerAkad->tenor }}</span></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Bulan</span></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
    </tr>
    <tr style='height:4.0pt'>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:4.0pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Angsuran
                    perbulan</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:4.0pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:4.0pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></b></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:4.0pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->angsuran, 0, ',', '.') }}</span></b><b><span
                        lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></b></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:4.0pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></b></p>
        </td>
    </tr>
    <tr style='height:4.0pt'>
        <td width=236 valign=top style='width:177.2pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:4.0pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Denda</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:4.0pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>: </span></p>
        </td>
        <td width=28 valign=top style='width:21.25pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:4.0pt'>
            <p class=MsoNormal style='margin-right:-5.4pt;text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Rp.</span></b></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:4.0pt'>
            <p class=MsoNormal align=right style='text-align:right;text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ number_format($registerAkad->denda_per_hari, 0, ',', '.') }}</span></b><b><span
                        lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,-</span></b></p>
        </td>
        <td width=132 valign=top style='width:99.25pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:4.0pt'>
            <p class=MsoNormal style='text-align:justify;text-autospace:none'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>/Hari</span></b></p>
        </td>
    </tr>
</table>

<p class=MsoNormal style='margin-top:6.0pt;text-align:justify;text-autospace:
    none'><b><u><span lang=EN-US
                style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>D.
                <span style='text-transform:uppercase'>JAMINAN PEMBIAYAAN :</span></span></u></b></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0
    style='margin-left:10.0pt;border-collapse:collapse;border:none'>
    <tr>
        <td width=113 style='width:4.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Jaminan</span></p>
        </td>
        <td width=19 style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=501 style='width:375.65pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $registerAkad->jaminan->nama_jaminan1 }}</span>
            </p>
        </td>
    </tr>
    <tr>
        <td width=113 style='width:3.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Nomor</span></p>
        </td>
        <td width=19 style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=501 style='width:375.65pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $registerAkad->jaminan->no_jaminan1 }}</span>
            </p>
        </td>
    </tr>
    <tr>
        <td width=113 style='width:3.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Atas Nama</span></p>
        </td>
        <td width=19 style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=501 style='width:375.65pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $registerAkad->jaminan->atas_nama_jaminan1 }}</span>
            </p>
        </td>
    </tr>
    <tr>
        <td width=113 style='width:3.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Diterbitkan oleh</span></p>
        </td>
        <td width=19 style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=501 style='width:375.65pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $registerAkad->jaminan->penerbit_jaminan1 }}</span>
            </p>
        </td>
    </tr>
    <tr>
        <td width=113 valign=top style='width:3.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Alamat Jaminan</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=501 style='width:375.65pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($registerAkad->jaminan->alamat_jaminan1)) }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'> RT </span><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($registerAkad->jaminan->rt_jaminan1)) }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>/RW </span><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($registerAkad->jaminan->rw_jaminan1)) }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>, Kel. </span><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($registerAkad->jaminan->kel_jaminan1)) }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,
                    Kec. </span><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($registerAkad->jaminan->kec_jaminan1)) }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>,
                </span><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($registerAkad->jaminan->kabkota_jaminan1)) }}</span><span
                    lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>.</span></p>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
            <p class=MsoNormal style='text-autospace:none'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
    </tr>
</table>

<p class=MsoNormal style='margin-bottom:10.0pt;line-height:115%'><b><u><span lang=EN-US
                style='font-size:11.0pt;line-height:115%;font-family:"Ottawa",sans-serif'>E.
                <span style='text-transform:uppercase'>Persyaratan Pembiayaan</span></span></u></b></p>

<p class=MsoNormal style='margin-left:1.0cm;text-align:justify;text-indent:
    -14.15pt;text-autospace:none'><span
        lang=EN-US style='font-size:11.0pt'>1.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
        </span></span><span lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Telah
        menyetujui isi Surat Prinsip Persetujuan Pembiayaan (SP3) yang diterbitkan oleh
        Bank BPRS Bogor Tegar Beriman.</span></p>

<p class=MsoNormal style='margin-left:1.0cm;text-align:justify;text-indent:
    -14.15pt;text-autospace:none'><span
        lang=EN-US style='font-size:11.0pt'>2.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
        </span></span><span lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Pembayaran
        angsuran pembiayaan dilakukan secara kolektif melalui Juru Bayar/Bendahara
        Bayar yang telah disetujui melalui surat kuasa memotong gaji dan telah mendapat
        rekomendasi dari atasan nasabah.</span></p>

<p class=MsoNormal style='margin-left:1.0cm;text-align:justify;text-indent:
    -14.15pt;text-autospace:none'><span
        lang=EN-US style='font-size:11.0pt'>3.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
        </span></span><span lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Fasilitas
        dapat dipergunakan apabila pengikatan pembiayaan dan jaminan telah dilakukan
        sempurna, Semua pihak hadir (pihak nasabah dan pihak Bank BPRS Bogor Tegar
        Beriman) pada saat pengikatan pembiayaan.</span></p>

<p class=MsoNormal style='margin-left:1.0cm;text-align:justify;text-indent:
    -14.15pt;text-autospace:none'><span
        lang=EN-US style='font-size:11.0pt'>4.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
        </span></span><span lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Dokumen
        Asli serta dokumen yang kurang (TBO), telah dilengkapi dan diserahkan
        kepada Bank BPRS Bogor Tegar Beriman.</span></p>

<p class=MsoNormal style='margin-left:1.0cm;text-align:justify;text-indent:
    -14.15pt;text-autospace:none'><span
        lang=EN-US style='font-size:11.0pt'>5.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
        </span></span><span lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Nasabah
        harus segera melampirkan bukti penggunaan dana pembiayaan setelah pencairan
        dengan menandatangi surat pernyataan nasabah.</span></p>

<p class=MsoNormal style='margin-left:1.0cm;text-align:justify;text-indent:
    -14.15pt;text-autospace:none'><span
        lang=EN-US style='font-size:11.0pt'>6.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
        </span></span><span lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Nasabah
        telah membuka rekening di Bank BPRS Bogor Tegar Beriman dan biaya-biaya yang
        berkaitan dengan pembiayaan nasabah (biaya-biaya yang tercantum di halaman 1
        dari SP3 ini) telah dibayarkan lunas oleh nasabah pada saat pencairan
        pembiayaan. </span></p>

<p class=MsoNormal style='margin-left:1.0cm;text-align:justify;text-indent:
    -14.15pt;text-autospace:none'><span
        lang=EN-US style='font-size:11.0pt'>7.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
        </span></span><span lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Menyerahkan
        surat kuasa debet rekening Tabungan Nasabah untuk pembayaran angsuran
        pembiayaan Nasabah ke Bank BPRS Bogor Tegar Beriman</span></p>

<p class=MsoNormal style='margin-left:1.0cm;text-align:justify;text-indent:
    -14.15pt;text-autospace:none'><span
        lang=EN-US style='font-size:11.0pt'>8.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
        </span></span><span lang=EN-US style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Asuransi
        Jiwa harus di Perusahaan Asuransi rekanan Bank BPRS Bogor Tegar Beriman.</span></p>

<p class=MsoNormal style='margin-left:1.0cm;text-align:justify;text-autospace:
    none'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>

<p class=MsoNormal style='margin-left:54.0pt;text-align:justify'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'></span></p>

<p class=MsoNormal style='margin-bottom:6.0pt;text-align:justify'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Adanya
        pembatalan pembiayaan ini oleh pihak nasabah setelah SP3 ini ditandatangani
        maka segala biaya yang timbul berkaitan dengan pembiayaan sepenuhnya ini
        menjadikan tanggung jawab nasabah. </span></p>

<p class=MsoNormal style='margin-bottom:6.0pt;text-align:justify'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Jika anda
        setuju dengan seluruh persyaratan dan kondisi tersebut di atas, harap nyatakan
        persetujuan anda dengan menandatangani dan mengembalikan kepada kami surat ini
        selambat-lambatnya 14 hari sejak tanggal surat ini. </span></p>

<p class=MsoNormal style='text-align:justify'><i><span lang=EN-US
            style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Wassalamualaikum
            Warahmatullahi Wabarakatuh</span></i></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'></span></p>
<br />

<p class=MsoNormal style='text-align:justify'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Hormat Kami,</span></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 style='border-collapse:collapse;border:none'>
    <tr>
        <td width=645 colspan=3 valign=top style='width:483.75pt;padding:0cm 5.4pt 0cm 0cm'>
            <p class=MsoNormal style='text-align:justify'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>BANK BPRS BOGOR
                        TEGAR BERIMAN</span></b></p>
            <p class=MsoNormal style='text-align:justify'><b><span lang=IN
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></b></p>
            <p class=MsoNormal style='text-align:justify'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></b></p>
            <p class=MsoNormal style='text-align:justify'><b><span lang=EN-US
                        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></b></p>
            <p class=MsoNormal style='text-align:justify'><span lang=IN
                    style='font-size:
      11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
    </tr>
    <tr>
        <td width=73 valign=top style='width:54.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Nama</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=553 valign=top style='width:415.05pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><b><u><span lang=EN-US
                            style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Arie Wibowo Irawan,
                            SP., MM.</span></u></b></p>
        </td>
    </tr>
    <tr>
        <td width=73 valign=top style='width:54.55pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Jabatan</span></p>
        </td>
        <td width=19 valign=top style='width:14.15pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=553 valign=top style='width:415.05pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Direktur Bisnis</span></p>
        </td>
    </tr>
</table>

<p class=MsoNormal style='text-align:justify'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-US
        style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 style='border-collapse:collapse;border:none'>
    <tr style='height:67.4pt'>
        <td width=72 valign=top style='width:53.9pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:67.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Disetujui</span></p>
        </td>
        <td width=19 valign=top style='width:13.9pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:67.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=295 valign=top style='width:221.1pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:67.4pt'>
            <p class=MsoNormal align=right style='text-align:right'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
        <td width=282 colspan=3 valign=top style='width:211.5pt;padding:0cm 5.4pt 0cm 5.4pt;
      height:67.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Mengetahui,</span></p>
        </td>
    </tr>
    <tr>
        <td width=72 valign=top style='width:53.9pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Oleh</span></p>
        </td>
        <td width=19 valign=top style='width:13.9pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=295 valign=top style='width:221.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><b><u><span lang=EN-US
                            style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ ucwords(strtolower($nasabah->nama_nasabah)) }}</span></u></b>
            </p>
        </td>
        <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal align=right style='text-align:right'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Oleh</span></p>
        </td>
        <td width=19 valign=top style='width:14.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>:</span></p>
        </td>
        <td width=295 valign=top style='width:221.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><b><u><span lang=EN-US
                            style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $nasabah->status_pernikahan == 'Menikah' ? ucwords(strtolower($nasabah->nama_pasangan_nasabah)) : '' }}</span></u></b>
            </p>
        </td>
        <td width=225 valign=top style='width:168.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'></p>
        </td>
    </tr>
    <tr>
        <td width=72 valign=top style='width:53.9pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
        <td width=19 valign=top style='width:13.9pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
        <td width=295 valign=top style='width:221.1pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>Nasabah</span></p>
        </td>
        <td width=38 valign=top style='width:1.0cm;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
        <td width=19 valign=top style='width:14.2pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>&nbsp;</span></p>
        </td>
        <td width=225 valign=top style='width:168.95pt;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='text-align:justify'><span lang=EN-US
                    style='font-size:11.0pt;font-family:"Ottawa",sans-serif'>{{ $nasabah->status_pernikahan == 'Menikah' ? $statusPasangan : '' }}
                    Nasabah</span></p>
        </td>
    </tr>
</table>

<p class=MsoNormal style='text-align:justify'><b><u><span lang=EN-US
                style='font-size:11.0pt;font-family:"Ottawa",sans-serif;text-transform:uppercase'></span></u></b></p>
<br />
<p class=MsoNormal style='text-align:justify'><b><u><span lang=EN-US
                style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>*) SP3 ini gugur/batal
                dengan kondisi :</span></u></b></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:27.0pt;text-align:justify;
    text-indent:-9.0pt'><span
        lang=EN-US style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>-<span
            style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><i><span lang=EN-US
            style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>Agunan yang
            dijaminkan adalah palsu atau dalam sengketa;</span></i></p>

<p class=MsoListParagraphCxSpLast style='margin-left:27.0pt;text-align:justify;
    text-indent:-9.0pt'><span
        lang=EN-US style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>-<span
            style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><i><span lang=EN-US
            style='font-size:10.0pt;font-family:"Ottawa",sans-serif'>Jika
            didalam proses pembiayaan adanya negatif informasi tentang nasabah, BPRS BTB
            dapat memutuskan secara sepihak.</span></i></p>
