<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\UltraMikro\Entities\UltraMikroNasabah;
use Modules\UltraMikro\Entities\UltraMikroPembiayaan;

class NasabahUltraMikroController extends Controller
{
     /**
      * GET /api/nasabah/ultra-mikro/{nik}
      *
      * Mengembalikan data nasabah Ultra Mikro beserta pembiayaan yang sudah disetujui Kabag (status_id = 5).
      */
     public function show(string $nik)
     {
          if (!preg_match('/^\d{16}$/', $nik)) {
               return response()->json([
                    'success' => false,
                    'message' => 'Format NIK tidak valid. NIK harus 16 digit angka.',
               ], 422);
          }

          $nasabahExists = UltraMikroNasabah::where('no_ktp', $nik)->exists();

          if (!$nasabahExists) {
               return response()->json([
                    'success' => false,
                    'message' => 'Nasabah dengan NIK tersebut tidak ditemukan.',
               ], 404);
          }

          $nasabahIds = UltraMikroNasabah::where('no_ktp', $nik)->pluck('id');

          $pembiayaanList = UltraMikroPembiayaan::whereIn('ultra_mikro_nasabah_id', $nasabahIds)
               ->whereHas('histories', function ($q) {
                    $q->where('status_id', 5);
               })
               ->with(['latestHistory', 'nasabah', 'catatanKomite'])
               ->get();

          if ($pembiayaanList->isEmpty()) {
               return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada pembiayaan yang sudah disetujui Kabag untuk NIK tersebut.',
               ], 404);
          }

          $nasabahAktif = $pembiayaanList->first()->nasabah;

          return response()->json([
               'success' => true,
               'data' => [
                    'nasabah' => [
                         'id'                    => $nasabahAktif->id,
                         'nama_nasabah'          => $nasabahAktif->nama_nasabah,
                         'no_ktp'                => $nasabahAktif->no_ktp,
                         'tempat_lahir'          => $nasabahAktif->tempat_lahir,
                         'tgl_lahir'             => $nasabahAktif->tgl_lahir,
                         'usia_saat_pengajuan'   => $nasabahAktif->usia_saat_pengajuan,
                         'jenis_kelamin'         => $nasabahAktif->jenis_kelamin,
                         'agama'                 => $nasabahAktif->agama,
                         'alamat_ktp'            => $nasabahAktif->alamat_ktp,
                         'alamat_domisili'       => $nasabahAktif->alamat_domisili,
                         'no_hp'                 => $nasabahAktif->no_hp,
                         'status_pernikahan'     => $nasabahAktif->status_pernikahan,
                         'nama_pasangan_nasabah' => $nasabahAktif->nama_pasangan_nasabah,
                         'no_ktp_pasangan'       => $nasabahAktif->no_ktp_pasangan,
                         'jml_tanggungan'        => $nasabahAktif->jml_tanggungan,
                         'nama_pekerjaan'        => $nasabahAktif->nama_pekerjaan,
                         'jenis_pekerjaan'       => $nasabahAktif->jenis_pekerjaan,
                         'lama_pekerjaan'        => $nasabahAktif->lama_pekerjaan,
                         'tempat_pekerjaan'      => $nasabahAktif->tempat_pekerjaan,
                    ],
                    'pembiayaan' => $pembiayaanList->map(function ($p) {
                         return [
                              'id'                    => $p->id,
                              'tanggal_pengajuan'     => $p->tanggal_pengajuan,
                              'nomor_aplikasi'        => $p->nomor_aplikasi,
                              'jenis_pby_ultra_mikro' => $p->jenis_pby_ultra_mikro,
                              'nominal_pembiayaan'    => $p->nominal_pembiayaan,
                              'rate'                  => $p->rate,
                              'tenor'                 => $p->tenor,
                              'harga_jual'            => $p->harga_jual,
                              'akad'                  => $p->akad,
                              'tujuan_pembiayaan'     => $p->tujuan_pembiayaan,
                              'frekuensi_pembayaran'  => $p->frekuensi_pembayaran,
                              'penghasilan'           => $p->penghasilan,
                              'omset'                 => $p->omset,
                              'status' => [
                                   'id'   => (int) $p->latestHistory->status_id,
                                   'nama' => 'Disetujui Kabag',
                              ],
                              'catatan_komite' => $p->catatanKomite->map(fn($c) => [
                                   'peran'   => $c->jabatan_id == 2 ? 'Kabag' : 'Analis',
                                   'catatan' => $c->catatan,
                              ])->values(),
                         ];
                    }),
               ],
          ]);
     }
}
