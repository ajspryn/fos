<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaan;

class NasabahUmkmController extends Controller
{
     /**
      * GET /api/nasabah/umkm/{nik}
      *
      * Mengembalikan data nasabah UMKM beserta pembiayaan yang sudah disetujui Kabag (status_id = 5).
      */
     public function show(string $nik)
     {
          if (!preg_match('/^\d{16}$/', $nik)) {
               return response()->json([
                    'success' => false,
                    'message' => 'Format NIK tidak valid. NIK harus 16 digit angka.',
               ], 422);
          }

          $nasabahExists = UmkmNasabah::where('no_ktp', $nik)->exists();

          if (!$nasabahExists) {
               return response()->json([
                    'success' => false,
                    'message' => 'Nasabah dengan NIK tersebut tidak ditemukan.',
               ], 404);
          }

          $nasabahIds = UmkmNasabah::where('no_ktp', $nik)->pluck('id');

          $pembiayaanList = UmkmPembiayaan::whereIn('nasabah_id', $nasabahIds)
               ->whereHas('history', function ($q) {
                    $q->where('status_id', 5);
               })
               ->with(['latestHistory', 'nasabahh', 'catatanKomite', 'akad', 'sektor', 'keteranganusaha'])
               ->get();

          if ($pembiayaanList->isEmpty()) {
               return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada pembiayaan yang sudah disetujui Kabag untuk NIK tersebut.',
               ], 404);
          }

          $nasabahAktif = $pembiayaanList
               ->pluck('nasabahh')
               ->filter()
               ->first();

          if (!$nasabahAktif) {
               return response()->json([
                    'success' => false,
                    'message' => 'Data nasabah pada pembiayaan tidak lengkap.',
               ], 422);
          }

          return response()->json([
               'success' => true,
               'data' => [
                    'nasabah' => [
                         'id'               => $nasabahAktif->id,
                         'nama_nasabah'     => $nasabahAktif->nama_nasabah,
                         'no_ktp'           => $nasabahAktif->no_ktp,
                         'tmp_lahir'        => $nasabahAktif->tmp_lahir,
                         'tgl_lahir'        => $nasabahAktif->tgl_lahir,
                         'jenis_kelamin'    => $nasabahAktif->jenis_kelamin,
                         'alamat'           => $nasabahAktif->alamat,
                         'rt'               => $nasabahAktif->rt,
                         'rw'               => $nasabahAktif->rw,
                         'desa_kelurahan'   => $nasabahAktif->desa_kelurahan,
                         'kecamatan'        => $nasabahAktif->kecamatan,
                         'kabkota'          => $nasabahAktif->kabkota,
                         'provinsi'         => $nasabahAktif->provinsi,
                         'alamat_domisili'  => $nasabahAktif->alamat_domisili,
                         'no_tlp'           => $nasabahAktif->no_tlp,
                         'npwp'             => $nasabahAktif->npwp,
                         'nama_pasangan'    => $nasabahAktif->nama_pasangan,
                         'ktp_pasangan'     => $nasabahAktif->ktp_pasangan,
                         'nama_ibu'         => $nasabahAktif->nama_ibu,
                         'jumlah_anak'      => $nasabahAktif->jumlah_anak,
                         'namaot'           => $nasabahAktif->namaot,
                         'alamat_ot'        => $nasabahAktif->alamat_ot,
                         'telp_ot'          => $nasabahAktif->telp_ot,
                    ],
                    'pembiayaan' => $pembiayaanList->map(function ($p) {
                         return [
                              'id'                   => $p->id,
                              'tgl_pembiayaan'       => $p->tgl_pembiayaan,
                              'nominal_pembiayaan'   => $p->nominal_pembiayaan,
                              'rate'                 => $p->rate,
                              'tenor'                => $p->tenor,
                              'omset'                => $p->omset,
                              'kesanggupan_angsuran' => $p->kesanggupan_angsuran,
                              'keb_keluarga'         => $p->keb_keluarga,
                              'akad'                 => $p->akad?->nama_akad ?? null,
                              'sektor'               => $p->sektor?->nama_sektor_ekonomi ?? null,
                              'keterangan_usaha' => $p->keteranganusaha ? [
                                   'nama_usaha'   => $p->keteranganusaha->nama_usaha ?? null,
                                   'jenis_usaha'  => $p->keteranganusaha->jenis_usaha ?? null,
                                   'alamat_usaha' => $p->keteranganusaha->alamat_usaha ?? null,
                              ] : null,
                              'status' => [
                                   'id'   => (int) ($p->latestHistory->status_id ?? 5),
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
