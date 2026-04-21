<?php

namespace App\Http\Traits;

trait Terbilang
{
    private function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $libs = array(
            "",
            "satu",
            "dua",
            "tiga",
            "empat",
            "lima",
            "enam",
            "tujuh",
            "delapan",
            "sembilan",
            "sepuluh",
            "sebelas"
        );
        $n = " ";

        if ($nilai < 12) {
            $n = " " . $libs[$nilai];
        } else if ($nilai < 20) {
            $n = self::penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $n = self::penyebut($nilai / 10) . " puluh" . self::penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $n = " seratus" . self::penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $n = self::penyebut($nilai / 100) . " ratus" . self::penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $n = " seribu" . self::penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $n = self::penyebut($nilai / 1000) . " ribu" . self::penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $n = self::penyebut($nilai / 1000000) . " juta" . self::penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $n = self::penyebut($nilai / 1000000000) . " miliar" . self::penyebut(fmod($nilai, 1000000000000));
        } else if ($nilai < 1000000000000000) {
            $n = self::penyebut($nilai / 1000000000) . " triliun" . self::penyebut(fmod($nilai, 1000000000000000));
        }
        return $n;
    }

    public function pembilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }
}
