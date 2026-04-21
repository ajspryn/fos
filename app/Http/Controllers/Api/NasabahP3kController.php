<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\P3k\Entities\P3kNasabah;
use Modules\P3k\Entities\P3kPembiayaan;

class NasabahP3kController extends Controller
{
     /**
      * GET /api/nasabah/p3k/{nik}
      *
      * Mengembalikan data nasabah P3K beserta pembiayaan yang sudah disetujui Kabag (status_id = 5).
      */
     public function show(string $nik)
     {
          // Validasi format NIK: 16 digit angka
          if (!preg_match('/^\d{16}$/', $nik)) {
               return response()->json([
                    'success' => false,
                    'message' => 'Format NIK tidak valid. NIK harus 16 digit angka.',
               ], 422);
          }

          $nasabah = P3kNasabah::where('no_ktp', $nik)->first();

          if (!$nasabah) {
               return response()->json([
                    'success' => false,
                    'message' => 'Nasabah dengan NIK tersebut tidak ditemukan.',
               ], 404);
          }

          // Cari semua ID nasabah dengan NIK ini (antisipasi duplikat data)
          $nasabahIds = P3kNasabah::where('no_ktp', $nik)->pluck('id');

          // Ambil pembiayaan yang pernah disetujui Kabag (ada history status_id = 5)
          $pembiayaanList = P3kPembiayaan::whereIn('p3k_nasabah_id', $nasabahIds)
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

          // Data pekerjaan dan orang terdekat dari nasabah yang punya pembiayaan
          $nasabahAktif = $pembiayaanList->first()->nasabah;

          if (!$nasabahAktif) {
               return response()->json([
                    'success' => false,
                    'message' => 'Data nasabah pada pembiayaan tidak lengkap.',
               ], 422);
          }

          $pekerjaan = $nasabahAktif->pekerjaan;
          $orangTerdekat = $nasabahAktif->orangTerdekat;

          return response()->json([
               'success' => true,
               'data' => [
                    'nasabah' => [
                         'id'               => $nasabahAktif->id,
                         'nama_nasabah'     => $nasabahAktif->nama_nasabah,
                         'no_ktp'           => $nasabahAktif->no_ktp,
                         'tempat_lahir'     => $nasabahAktif->tempat_lahir,
                         'tgl_lahir'        => $nasabahAktif->tgl_lahir,
                         'jenis_kelamin'    => $nasabahAktif->jenis_kelamin,
                         'agama'            => $nasabahAktif->agama,
                         'tinggi_badan'     => $nasabahAktif->tinggi_badan,
                         'berat_badan'      => $nasabahAktif->berat_badan,
                         'alamat'           => $nasabahAktif->alamat,
                         'rt'               => $nasabahAktif->rt,
                         'rw'               => $nasabahAktif->rw,
                         'desa_kelurahan'   => $nasabahAktif->desa_kelurahan,
                         'kecamatan'        => $nasabahAktif->kecamatan,
                         'kabkota'          => $nasabahAktif->kabkota,
                         'provinsi'         => $nasabahAktif->provinsi,
                         'kd_pos'           => $nasabahAktif->kd_pos,
                         'no_hp'            => $nasabahAktif->no_hp,
                         'status_pernikahan'    => $nasabahAktif->status_pernikahan,
                         'nama_pasangan_nasabah' => $nasabahAktif->nama_pasangan_nasabah,
                         'no_ktp_pasangan'  => $nasabahAktif->no_ktp_pasangan,
                         'jml_tanggungan'   => $nasabahAktif->jml_tanggungan,
                    ],
                    'pekerjaan' => $pekerjaan ? [
                         'dinas'          => $pekerjaan->dinas,
                         'nama_unit_kerja' => $pekerjaan->nama_unit_kerja,
                         'jabatan'        => $pekerjaan->jabatan,
                         'no_sk'          => $pekerjaan->no_sk,
                    ] : null,
                    'orang_terdekat' => $orangTerdekat ? [
                         'nama'        => $orangTerdekat->nama_orang_terdekat,
                         'alamat'      => $orangTerdekat->alamat_orang_terdekat,
                         'rt'          => $orangTerdekat->rt_orang_terdekat,
                         'rw'          => $orangTerdekat->rw_orang_terdekat,
                         'kelurahan'   => $orangTerdekat->desa_kelurahan_orang_terdekat,
                         'kecamatan'   => $orangTerdekat->kecamatan_orang_terdekat,
                         'kabkota'     => $orangTerdekat->kabkota_orang_terdekat,
                         'provinsi'    => $orangTerdekat->provinsi_orang_terdekat,
                         'kd_pos'      => $orangTerdekat->kd_pos_orang_terdekat,
                         'no_telp'     => $orangTerdekat->no_telp_orang_terdekat,
                    ] : null,
                    'pembiayaan' => $pembiayaanList->map(function ($p) {
                         return [
                              'id'                           => $p->id,
                              'tanggal_pengajuan'            => $p->tanggal_pengajuan,
                              'jenis_penggunaan'             => $p->jenis_penggunaan,
                              'nominal_pembiayaan'           => (int) $p->nominal_pembiayaan,
                              'rate'                         => $p->rate,
                              'tenor'                        => (int) $p->tenor,
                              'harga_jual'                   => $p->harga_jual,
                              'gaji_pokok'                   => (int) $p->gaji_pokok,
                              'gaji_tpp'                     => (int) $p->gaji_tpp,
                              'gaji_pasangan'                => (int) $p->gaji_pasangan,
                              'total_angsuran_btb_fas_aktif' => (int) $p->total_angsuran_btb_fas_aktif,
                              'pengeluaran_lainnya'          => (int) $p->pengeluaran_lainnya,
                              'pengajuan_fas_aktif_ke'       => $p->pengajuan_fas_aktif_ke,
                              'status'                       => [
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
