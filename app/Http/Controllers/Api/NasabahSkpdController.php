<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Skpd\Entities\SkpdPembiayaan;

class NasabahSkpdController extends Controller
{
     /**
      * GET /api/nasabah/skpd/{nik}
      *
      * Mengembalikan data nasabah SKPD beserta pembiayaan yang sudah disetujui Kabag (status_id = 5).
      */
     public function show(string $nik)
     {
          if (!preg_match('/^\d{16}$/', $nik)) {
               return response()->json([
                    'success' => false,
                    'message' => 'Format NIK tidak valid. NIK harus 16 digit angka.',
               ], 422);
          }

          $nasabahExists = SkpdNasabah::where('no_ktp', $nik)->exists();

          if (!$nasabahExists) {
               return response()->json([
                    'success' => false,
                    'message' => 'Nasabah dengan NIK tersebut tidak ditemukan.',
               ], 404);
          }

          $nasabahIds = SkpdNasabah::where('no_ktp', $nik)->pluck('id');

          $pembiayaanList = SkpdPembiayaan::whereIn('skpd_nasabah_id', $nasabahIds)
               ->whereHas('histories', function ($q) {
                    $q->where('status_id', 5);
               })
               ->with(['latestHistory', 'nasabah', 'catatanKomite', 'instansi', 'golongan', 'jenis_penggunaan', 'akad'])
               ->get();

          if ($pembiayaanList->isEmpty()) {
               return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada pembiayaan yang sudah disetujui Kabag untuk NIK tersebut.',
               ], 404);
          }

          $nasabahAktif = $pembiayaanList->first()->nasabah;
          $orangTerdekat = $nasabahAktif->orang_terdekat;

          return response()->json([
               'success' => true,
               'data' => [
                    'nasabah' => [
                         'id'               => $nasabahAktif->id,
                         'nama_nasabah'     => $nasabahAktif->nama_nasabah,
                         'no_ktp'           => $nasabahAktif->no_ktp,
                         'tempat_lahir'     => $nasabahAktif->tempat_lahir,
                         'tgl_lahir'        => $nasabahAktif->tgl_lahir,
                         'alamat'           => $nasabahAktif->alamat,
                         'rt'               => $nasabahAktif->rt,
                         'rw'               => $nasabahAktif->rw,
                         'desa_kelurahan'   => $nasabahAktif->desa_kelurahan,
                         'kecamatan'        => $nasabahAktif->kecamatan,
                         'kabkota'          => $nasabahAktif->kabkota,
                         'provinsi'         => $nasabahAktif->provinsi,
                         'kd_pos'           => $nasabahAktif->kd_pos,
                         'no_telp'          => $nasabahAktif->no_telp,
                         'no_npwp'          => $nasabahAktif->no_npwp,
                         'status_perkawinan_id' => $nasabahAktif->skpd_status_perkawinan_id,
                         'tanggungan_id'    => $nasabahAktif->skpd_tanggungan_id,
                    ],
                    'orang_terdekat' => $orangTerdekat ? [
                         'nama'     => $orangTerdekat->nama_orang_terdekat ?? null,
                         'alamat'   => $orangTerdekat->alamat_orang_terdekat ?? null,
                         'no_telp'  => $orangTerdekat->no_telp_orang_terdekat ?? null,
                    ] : null,
                    'pembiayaan' => $pembiayaanList->map(function ($p) {
                         return [
                              'id'                     => $p->id,
                              'tanggal_pengajuan'      => $p->tanggal_pengajuan,
                              'nominal_pembiayaan'     => $p->nominal_pembiayaan,
                              'rate'                   => $p->rate,
                              'tenor'                  => $p->tenor,
                              'jabatan'                => $p->jabatan,
                              'gaji_pokok'             => $p->gaji_pokok,
                              'gaji_tpp'               => $p->gaji_tpp,
                              'pendapatan_lainnya'     => $p->pendapatan_lainnya,
                              'pengeluaran_lainnya'    => $p->pengeluaran_lainnya,
                              'instansi'               => $p->instansi?->nama_instansi ?? null,
                              'golongan'               => $p->golongan?->golongan ?? null,
                              'jenis_penggunaan'       => $p->jenis_penggunaan?->jenis_penggunaan ?? null,
                              'akad'                   => $p->akad?->akad ?? null,
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
