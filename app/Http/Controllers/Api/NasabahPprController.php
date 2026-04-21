<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Form\Entities\FormPprDataPribadi;
use Modules\Form\Entities\FormPprPembiayaan;

class NasabahPprController extends Controller
{
     /**
      * GET /api/nasabah/ppr/{nik}
      *
      * Mengembalikan data nasabah PPR beserta pembiayaan yang sudah disetujui Kabag (status_id = 5).
      * NIK disimpan di form_ppr_data_pribadis.form_pribadi_pemohon_no_ktp
      */
     public function show(string $nik)
     {
          if (!preg_match('/^\d{16}$/', $nik)) {
               return response()->json([
                    'success' => false,
                    'message' => 'Format NIK tidak valid. NIK harus 16 digit angka.',
               ], 422);
          }

          $dataPribadis = FormPprDataPribadi::where('form_pribadi_pemohon_no_ktp', $nik)->pluck('id');

          if ($dataPribadis->isEmpty()) {
               return response()->json([
                    'success' => false,
                    'message' => 'Nasabah dengan NIK tersebut tidak ditemukan.',
               ], 404);
          }

          $pembiayaanList = FormPprPembiayaan::whereIn('form_ppr_data_pribadi_id', $dataPribadis)
               ->whereHas('histories', function ($q) {
                    $q->where('status_id', 5);
               })
               ->with(['latestHistory', 'pemohon', 'catatanKomite', 'pekerjaan', 'agunan'])
               ->get();

          if ($pembiayaanList->isEmpty()) {
               return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada pembiayaan yang sudah disetujui Kabag untuk NIK tersebut.',
               ], 404);
          }

          $dataPribadi = $pembiayaanList->first()->pemohon;

          return response()->json([
               'success' => true,
               'data' => [
                    'nasabah' => [
                         'id'                    => $dataPribadi->id,
                         'nama_lengkap'          => $dataPribadi->form_pribadi_pemohon_nama_lengkap,
                         'nama_ktp'              => $dataPribadi->form_pribadi_pemohon_nama_ktp,
                         'no_ktp'                => $dataPribadi->form_pribadi_pemohon_no_ktp,
                         'jenis_kelamin'         => $dataPribadi->form_pribadi_pemohon_jenis_kelamin,
                         'tempat_lahir'          => $dataPribadi->form_pribadi_pemohon_tempat_lahir,
                         'tanggal_lahir'         => $dataPribadi->form_pribadi_pemohon_tanggal_lahir,
                         'npwp'                  => $dataPribadi->form_pribadi_pemohon_npwp,
                         'pendidikan'            => $dataPribadi->form_pribadi_pemohon_pendidikan,
                         'agama'                 => $dataPribadi->form_pribadi_pemohon_agama,
                         'status_pernikahan'     => $dataPribadi->form_pribadi_pemohon_status_pernikahan,
                         'jml_anak'              => $dataPribadi->form_pribadi_pemohon_jml_anak,
                         'jml_tanggungan'        => $dataPribadi->form_pribadi_pemohon_jml_tanggungan,
                         'alamat_ktp'            => $dataPribadi->form_pribadi_pemohon_alamat_ktp,
                         'rt'                    => $dataPribadi->form_pribadi_pemohon_alamat_ktp_rt,
                         'rw'                    => $dataPribadi->form_pribadi_pemohon_alamat_ktp_rw,
                         'kelurahan'             => $dataPribadi->form_pribadi_pemohon_alamat_ktp_kelurahan,
                         'kecamatan'             => $dataPribadi->form_pribadi_pemohon_alamat_ktp_kecamatan,
                         'kabkota'               => $dataPribadi->form_pribadi_pemohon_alamat_ktp_dati2,
                         'provinsi'              => $dataPribadi->form_pribadi_pemohon_alamat_ktp_provinsi,
                         'kode_pos'              => $dataPribadi->form_pribadi_pemohon_alamat_ktp_kode_pos,
                         'no_handphone'          => $dataPribadi->form_pribadi_pemohon_no_handphone,
                         'no_telp'               => $dataPribadi->form_pribadi_pemohon_no_telp,
                    ],
                    'pembiayaan' => $pembiayaanList->map(function ($p) {
                         return [
                              'id'            => $p->id,
                              'jenis_nasabah' => $p->jenis_nasabah,
                              'pekerjaan' => $p->pekerjaan ? [
                                   'nama_perusahaan'   => $p->pekerjaan->form_pekerjaan_nama_perusahaan ?? null,
                                   'jabatan'           => $p->pekerjaan->form_pekerjaan_jabatan ?? null,
                                   'lama_bekerja'      => $p->pekerjaan->form_pekerjaan_lama_bekerja ?? null,
                                   'penghasilan_bersih' => $p->pekerjaan->form_pekerjaan_penghasilan_bersih ?? null,
                              ] : null,
                              'agunan' => $p->agunan ? [
                                   'jenis_agunan'  => $p->agunan->form_agunan_jenis_agunan ?? null,
                                   'nilai_agunan'  => $p->agunan->form_agunan_nilai_agunan ?? null,
                                   'alamat_agunan' => $p->agunan->form_agunan_alamat ?? null,
                              ] : null,
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
