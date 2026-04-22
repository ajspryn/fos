<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

class MonitoringController extends Controller
{
     /**
      * Daftar semua pengajuan lintas modul.
      */
     public function index(Request $request)
     {
          $type   = $request->type ?? 'semua';
          $search = $request->search;

          // ── sub-query latest history per modul ─────────────────────────────
          $phSub  = DB::raw('(SELECT pasar_pembiayaan_id, MAX(id) AS lid FROM pasar_pembiayaan_histories GROUP BY pasar_pembiayaan_id) AS phlat');
          $shSub  = DB::raw('(SELECT skpd_pembiayaan_id, MAX(id) AS lid FROM skpd_pembiayaan_histories GROUP BY skpd_pembiayaan_id) AS shlat');
          $uhSub  = DB::raw('(SELECT umkm_pembiayaan_id, MAX(id) AS lid FROM umkm_pembiayaan_histories GROUP BY umkm_pembiayaan_id) AS uhlat');
          $p3hSub = DB::raw('(SELECT p3k_pembiayaan_id, MAX(id) AS lid FROM p3k_pembiayaan_histories GROUP BY p3k_pembiayaan_id) AS p3hlat');
          $prSub  = DB::raw('(SELECT form_ppr_pembiayaan_id, MAX(id) AS lid FROM ppr_pembiayaan_histories GROUP BY form_ppr_pembiayaan_id) AS prlat');

          // ── pasar ───────────────────────────────────────────────────────────
          $qPasar = DB::table('pasar_pembiayaans AS pp')
               ->leftJoin('users AS u', 'u.id', '=', 'pp.AO_id')
               ->leftJoin($phSub, 'phlat.pasar_pembiayaan_id', '=', 'pp.id')
               ->leftJoin('pasar_pembiayaan_histories AS ph', 'ph.id', '=', 'phlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'ph.status_id')
               ->select([
                    DB::raw("'pasar' AS type"),
                    'pp.id',
                    DB::raw("COALESCE(pp.nasabah, '-') AS nama_nasabah"),
                    DB::raw("COALESCE(pp.harga, 0) AS nominal"),
                    DB::raw("DATE(pp.tgl_pembiayaan) AS tanggal"),
                    DB::raw("COALESCE(st.keterangan, '-') AS status"),
                    DB::raw("COALESCE(ph.status_id, 0) AS status_id"),
                    DB::raw("COALESCE(u.name, '-') AS ao_name"),
               ]);

          // ── skpd ────────────────────────────────────────────────────────────
          $qSkpd = DB::table('skpd_pembiayaans AS sp')
               ->leftJoin('users AS u', 'u.id', '=', 'sp.user_id')
               ->leftJoin('skpd_nasabahs AS sn', 'sn.id', '=', 'sp.skpd_nasabah_id')
               ->leftJoin($shSub, 'shlat.skpd_pembiayaan_id', '=', 'sp.id')
               ->leftJoin('skpd_pembiayaan_histories AS sh', 'sh.id', '=', 'shlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'sh.status_id')
               ->select([
                    DB::raw("'skpd' AS type"),
                    'sp.id',
                    DB::raw("COALESCE(sn.nama_nasabah, '-') AS nama_nasabah"),
                    DB::raw("COALESCE(sp.nominal_pembiayaan, 0) AS nominal"),
                    DB::raw("DATE(sp.tanggal_pengajuan) AS tanggal"),
                    DB::raw("COALESCE(st.keterangan, '-') AS status"),
                    DB::raw("COALESCE(sh.status_id, 0) AS status_id"),
                    DB::raw("COALESCE(u.name, '-') AS ao_name"),
               ]);

          // ── umkm ────────────────────────────────────────────────────────────
          $qUmkm = DB::table('umkm_pembiayaans AS up')
               ->leftJoin('users AS u', 'u.id', '=', 'up.AO_id')
               ->leftJoin($uhSub, 'uhlat.umkm_pembiayaan_id', '=', 'up.id')
               ->leftJoin('umkm_pembiayaan_histories AS uh', 'uh.id', '=', 'uhlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'uh.status_id')
               ->select([
                    DB::raw("'umkm' AS type"),
                    'up.id',
                    DB::raw("COALESCE(up.nasabah, '-') AS nama_nasabah"),
                    DB::raw("COALESCE(up.nominal_pembiayaan, 0) AS nominal"),
                    DB::raw("DATE(up.tgl_pembiayaan) AS tanggal"),
                    DB::raw("COALESCE(st.keterangan, '-') AS status"),
                    DB::raw("COALESCE(uh.status_id, 0) AS status_id"),
                    DB::raw("COALESCE(u.name, '-') AS ao_name"),
               ]);

          // ── p3k ─────────────────────────────────────────────────────────────
          $qP3k = DB::table('p3k_pembiayaans AS p3')
               ->leftJoin('users AS u', 'u.id', '=', 'p3.user_id')
               ->leftJoin('p3k_nasabahs AS pn', 'pn.id', '=', 'p3.p3k_nasabah_id')
               ->leftJoin($p3hSub, 'p3hlat.p3k_pembiayaan_id', '=', 'p3.id')
               ->leftJoin('p3k_pembiayaan_histories AS p3h', 'p3h.id', '=', 'p3hlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'p3h.status_id')
               ->select([
                    DB::raw("'p3k' AS type"),
                    'p3.id',
                    DB::raw("COALESCE(pn.nama_nasabah, '-') AS nama_nasabah"),
                    DB::raw("COALESCE(p3.nominal_pembiayaan, 0) AS nominal"),
                    DB::raw("DATE(p3.tanggal_pengajuan) AS tanggal"),
                    DB::raw("COALESCE(st.keterangan, '-') AS status"),
                    DB::raw("COALESCE(p3h.status_id, 0) AS status_id"),
                    DB::raw("COALESCE(u.name, '-') AS ao_name"),
               ]);

          // ── ppr ─────────────────────────────────────────────────────────────
          $qPpr = DB::table('form_ppr_pembiayaans AS fp')
               ->leftJoin('users AS u', 'u.id', '=', 'fp.user_id')
               ->leftJoin('form_ppr_data_pribadis AS pd', 'pd.id', '=', 'fp.form_ppr_data_pribadi_id')
               ->leftJoin($prSub, 'prlat.form_ppr_pembiayaan_id', '=', 'fp.id')
               ->leftJoin('ppr_pembiayaan_histories AS prh', 'prh.id', '=', 'prlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'prh.status_id')
               ->select([
                    DB::raw("'ppr' AS type"),
                    'fp.id',
                    DB::raw("COALESCE(pd.form_pribadi_pemohon_nama_lengkap, '-') AS nama_nasabah"),
                    DB::raw("COALESCE(fp.form_permohonan_nilai_ppr_dimohon, 0) AS nominal"),
                    DB::raw("DATE(fp.created_at) AS tanggal"),
                    DB::raw("COALESCE(st.keterangan, '-') AS status"),
                    DB::raw("COALESCE(prh.status_id, 0) AS status_id"),
                    DB::raw("COALESCE(u.name, '-') AS ao_name"),
               ]);

          // ── apply search on each sub-query's name column ────────────────────
          if ($search) {
               $qPasar->where('pp.nasabah', 'like', "%{$search}%");
               $qSkpd->where('sn.nama_nasabah', 'like', "%{$search}%");
               $qUmkm->where('up.nasabah', 'like', "%{$search}%");
               $qP3k->where('pn.nama_nasabah', 'like', "%{$search}%");
               $qPpr->where('pd.form_pribadi_pemohon_nama_lengkap', 'like', "%{$search}%");
          }

          // ── select query based on active tab ────────────────────────────────
          switch ($type) {
               case 'pasar':
                    $union = $qPasar;
                    break;
               case 'skpd':
                    $union = $qSkpd;
                    break;
               case 'umkm':
                    $union = $qUmkm;
                    break;
               case 'p3k':
                    $union = $qP3k;
                    break;
               case 'ppr':
                    $union = $qPpr;
                    break;
               default:
                    $union = $qPasar
                         ->unionAll($qSkpd)
                         ->unionAll($qUmkm)
                         ->unionAll($qP3k)
                         ->unionAll($qPpr);
                    break;
          }

          // ── wrap in subquery for sorting + pagination ────────────────────────
          $proposals = DB::table(DB::raw("({$union->toSql()}) AS combined"))
               ->mergeBindings($union)
               ->orderByDesc('tanggal')
               ->paginate(15)
               ->withQueryString();

          // ── counts per module (for badge on tabs) ────────────────────────────
          $counts = [
               'semua' => DB::table('pasar_pembiayaans')->count()
                    + DB::table('skpd_pembiayaans')->count()
                    + DB::table('umkm_pembiayaans')->count()
                    + DB::table('p3k_pembiayaans')->count()
                    + DB::table('form_ppr_pembiayaans')->count(),
               'pasar' => DB::table('pasar_pembiayaans')->count(),
               'skpd'  => DB::table('skpd_pembiayaans')->count(),
               'umkm'  => DB::table('umkm_pembiayaans')->count(),
               'p3k'   => DB::table('p3k_pembiayaans')->count(),
               'ppr'   => DB::table('form_ppr_pembiayaans')->count(),
          ];

          return view('admin::monitoring.index', [
               'title'     => 'Monitoring Pengajuan',
               'proposals' => $proposals,
               'type'      => $type,
               'search'    => $search,
               'counts'    => $counts,
          ]);
     }

     /**
      * Detail pengajuan berdasarkan tipe modul.
      */
     public function show(string $type, int $id)
     {
          switch ($type) {
               case 'pasar':
                    return $this->showPasar($id);
               case 'skpd':
                    return $this->showSkpd($id);
               case 'umkm':
                    return $this->showUmkm($id);
               case 'p3k':
                    return $this->showP3k($id);
               case 'ppr':
                    return $this->showPpr($id);
               default:
                    abort(404);
          }
     }

     // ── Private detail helpers ───────────────────────────────────────────────

     private function showPasar(int $id)
     {
          $pembiayaan   = PasarPembiayaan::with(['nasabahh', 'keteranganusaha.jenispasar', 'user'])->findOrFail($id);
          $histories    = PasarPembiayaanHistory::with(['statushistory', 'jabatan'])
               ->where('pasar_pembiayaan_id', $id)
               ->orderByDesc('id')
               ->get();
          $latestHistory = $histories->first();
          $nasabah       = $pembiayaan->nasabahh;

          return view('admin::monitoring.show', [
               'title'            => 'Detail Proposal Pasar',
               'segmentLabel'     => 'Pasar',
               'type'             => 'pasar',
               'proposalId'       => $id,
               'history'          => $latestHistory,
               'histories'        => $histories,
               'detailsNasabah'   => [
                    'Nama Nasabah' => $pembiayaan->nasabah ?? optional($nasabah)->nama_nasabah,
                    'Alamat'       => optional($nasabah)->alamat ?? '-',
               ],
               'detailsPembiayaan' => [
                    'Nama Kios / Los'     => optional($pembiayaan->keteranganusaha)->nama_usaha ?? '-',
                    'Jenis Pasar'         => optional(optional($pembiayaan->keteranganusaha)->jenispasar)->nama_pasar ?? '-',
                    'Nominal Pembiayaan'  => $pembiayaan->harga ? 'Rp ' . number_format($pembiayaan->harga, 0, ',', '.') : '-',
                    'Tanggal Pengajuan'   => $pembiayaan->tgl_pembiayaan,
                    'Tenor'               => $pembiayaan->tenor ? $pembiayaan->tenor . ' Bulan' : '-',
                    'Rate'                => $pembiayaan->rate ? $pembiayaan->rate . '%' : '-',
                    'AO Yang Menangani'   => optional($pembiayaan->user)->name ?? '-',
               ],
          ]);
     }

     private function showSkpd(int $id)
     {
          $pembiayaan   = SkpdPembiayaan::with(['nasabah', 'instansi', 'golongan', 'jenis_penggunaan'])->findOrFail($id);
          $histories    = SkpdPembiayaanHistory::with(['statushistory', 'jabatan'])
               ->where('skpd_pembiayaan_id', $id)
               ->orderByDesc('id')
               ->get();
          $latestHistory = $histories->first();

          return view('admin::monitoring.show', [
               'title'            => 'Detail Proposal SKPD',
               'segmentLabel'     => 'SKPD',
               'type'             => 'skpd',
               'proposalId'       => $id,
               'history'          => $latestHistory,
               'histories'        => $histories,
               'detailsNasabah'   => [
                    'Nama Nasabah' => optional($pembiayaan->nasabah)->nama_nasabah ?? '-',
                    'No KTP'       => optional($pembiayaan->nasabah)->no_ktp ?? '-',
                    'Alamat'       => optional($pembiayaan->nasabah)->alamat ?? '-',
                    'Instansi'     => optional($pembiayaan->instansi)->nama_instansi ?? '-',
                    'Golongan'     => optional($pembiayaan->golongan)->golongan ?? '-',
               ],
               'detailsPembiayaan' => [
                    'Nominal Pembiayaan' => $pembiayaan->nominal_pembiayaan ? 'Rp ' . number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.') : '-',
                    'Penggunaan'         => optional($pembiayaan->jenis_penggunaan)->nama_penggunaan ?? '-',
                    'Tanggal Pengajuan'  => $pembiayaan->tanggal_pengajuan,
                    'Tenor'              => $pembiayaan->tenor ? $pembiayaan->tenor . ' Bulan' : '-',
                    'Rate'               => $pembiayaan->rate ? $pembiayaan->rate . '%' : '-',
                    'AO Yang Menangani'  => optional(User::find($pembiayaan->user_id))->name ?? '-',
               ],
          ]);
     }

     private function showUmkm(int $id)
     {
          $pembiayaan   = UmkmPembiayaan::with(['nasabahh', 'keteranganusaha', 'user'])->findOrFail($id);
          $histories    = UmkmPembiayaanHistory::with(['statushistory', 'jabatan'])
               ->where('umkm_pembiayaan_id', $id)
               ->orderByDesc('id')
               ->get();
          $latestHistory = $histories->first();
          $nasabah       = $pembiayaan->nasabahh;

          return view('admin::monitoring.show', [
               'title'            => 'Detail Proposal UMKM',
               'segmentLabel'     => 'UMKM',
               'type'             => 'umkm',
               'proposalId'       => $id,
               'history'          => $latestHistory,
               'histories'        => $histories,
               'detailsNasabah'   => [
                    'Nama Nasabah' => $pembiayaan->nasabah ?? optional($nasabah)->nama_nasabah ?? '-',
                    'Alamat'       => optional($nasabah)->alamat ?? '-',
               ],
               'detailsPembiayaan' => [
                    'Nama Usaha'         => optional($pembiayaan->keteranganusaha)->nama_usaha ?? '-',
                    'Nominal Pembiayaan' => $pembiayaan->nominal_pembiayaan ? 'Rp ' . number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.') : '-',
                    'Tanggal Pengajuan'  => $pembiayaan->tgl_pembiayaan,
                    'Tenor'              => $pembiayaan->tenor ? $pembiayaan->tenor . ' Bulan' : '-',
                    'Rate'               => $pembiayaan->rate ? $pembiayaan->rate . '%' : '-',
                    'AO Yang Menangani'  => optional($pembiayaan->user)->name ?? '-',
               ],
          ]);
     }

     private function showP3k(int $id)
     {
          $pembiayaan   = P3kPembiayaan::with(['nasabah', 'user'])->findOrFail($id);
          $histories    = P3kPembiayaanHistory::with(['statushistory', 'jabatan'])
               ->where('p3k_pembiayaan_id', $id)
               ->orderByDesc('id')
               ->get();
          $latestHistory = $histories->first();
          $nasabah       = $pembiayaan->nasabah;

          return view('admin::monitoring.show', [
               'title'            => 'Detail Proposal P3K',
               'segmentLabel'     => 'P3K',
               'type'             => 'p3k',
               'proposalId'       => $id,
               'history'          => $latestHistory,
               'histories'        => $histories,
               'detailsNasabah'   => [
                    'Nama Nasabah' => optional($nasabah)->nama_nasabah ?? '-',
                    'No KTP'       => optional($nasabah)->no_ktp ?? '-',
                    'Alamat'       => optional($nasabah)->alamat ?? '-',
                    'Jabatan'      => $pembiayaan->jabatan ?? '-',
               ],
               'detailsPembiayaan' => [
                    'Nominal Pembiayaan' => $pembiayaan->nominal_pembiayaan ? 'Rp ' . number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.') : '-',
                    'Jenis Penggunaan'   => $pembiayaan->jenis_penggunaan ?? '-',
                    'Akad'               => $pembiayaan->akad ?? '-',
                    'Tanggal Pengajuan'  => $pembiayaan->tanggal_pengajuan,
                    'Tenor'              => $pembiayaan->tenor ? $pembiayaan->tenor . ' Bulan' : '-',
                    'Rate'               => $pembiayaan->rate ? $pembiayaan->rate . '%' : '-',
                    'AO Yang Menangani'  => optional($pembiayaan->user)->name ?? '-',
               ],
          ]);
     }

     private function showPpr(int $id)
     {
          $pembiayaan   = FormPprPembiayaan::with(['pemohon', 'user', 'pekerjaan'])->findOrFail($id);
          $histories    = PprPembiayaanHistory::with(['statusHistory', 'jabatan'])
               ->where('form_ppr_pembiayaan_id', $id)
               ->orderByDesc('id')
               ->get();
          $latestHistory = $histories->first();
          $pemohon       = $pembiayaan->pemohon;

          return view('admin::monitoring.show', [
               'title'            => 'Detail Proposal PPR',
               'segmentLabel'     => 'PPR',
               'type'             => 'ppr',
               'proposalId'       => $id,
               'history'          => $latestHistory,
               'histories'        => $histories,
               'detailsNasabah'   => [
                    'Nama Pemohon'  => optional($pemohon)->form_pribadi_pemohon_nama_lengkap ?? '-',
                    'No KTP'        => optional($pemohon)->form_pribadi_pemohon_no_ktp ?? '-',
                    'Alamat KTP'    => optional($pemohon)->form_pribadi_pemohon_alamat_ktp ?? '-',
                    'Jenis Nasabah' => $pembiayaan->jenis_nasabah ?? '-',
               ],
               'detailsPembiayaan' => [
                    'Nilai PPR Dimohon' => $pembiayaan->form_permohonan_nilai_ppr_dimohon ? 'Rp ' . number_format($pembiayaan->form_permohonan_nilai_ppr_dimohon, 0, ',', '.') : '-',
                    'Jenis Akad'        => $pembiayaan->form_permohonan_jenis_akad_pembayaran ?? '-',
                    'Jangka Waktu'      => $pembiayaan->form_permohonan_jangka_waktu_ppr ? $pembiayaan->form_permohonan_jangka_waktu_ppr . ' Bulan' : '-',
                    'Peruntukan'        => $pembiayaan->form_permohonan_peruntukan_ppr ?? '-',
                    'Tanggal Pengajuan' => $pembiayaan->created_at ? $pembiayaan->created_at->format('Y-m-d') : '-',
                    'AO Yang Menangani' => optional($pembiayaan->user)->name ?? '-',
               ],
          ]);
     }

     // ── Delete pembiayaan beserta seluruh data terkait ───────────────────────

     public function destroy(string $type, int $id)
     {
          DB::beginTransaction();
          try {
               switch ($type) {
                    case 'pasar':
                         $this->destroyPasar($id);
                         break;
                    case 'skpd':
                         $this->destroySkpd($id);
                         break;
                    case 'umkm':
                         $this->destroyUmkm($id);
                         break;
                    case 'p3k':
                         $this->destroyP3k($id);
                         break;
                    case 'ppr':
                         $this->destroyPpr($id);
                         break;
                    default:
                         abort(404);
               }
               DB::commit();
               return redirect()->route('admin.monitoring.index')
                    ->with('success', 'Data pembiayaan berhasil dihapus.');
          } catch (\Exception $e) {
               DB::rollBack();
               return redirect()->back()
                    ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
          }
     }

     private function destroyPasar(int $id): void
     {
          DB::table('pasar_pembiayaan_histories')->where('pasar_pembiayaan_id', $id)->delete();
          DB::table('pasar_fotos')->where('pasar_pembiayaan_id', $id)->delete();
          DB::table('pasar_deviasis')->where('pasar_pembiayaan_id', $id)->delete();
          DB::table('pasar_slik_pasangans')->where('pasar_pembiayaan_id', $id)->delete();
          DB::table('pasar_sliks')->where('pasar_pembiayaan_id', $id)->delete();
          DB::table('pasar_keterangan_usahas')->where('pasar_pembiayaan_id', $id)->delete();
          DB::table('pasar_legalitas_rumahs')->where('pasar_pembiayaan_id', $id)->delete();
          DB::table('pasar_jaminans')->where('pasar_pembiayaan_id', $id)->delete();
          DB::table('pasar_jaminan_lains')->where('pasar_pembiayaan_id', $id)->delete();
          DB::table('pasar_pembiayaans')->where('id', $id)->delete();
     }

     private function destroySkpd(int $id): void
     {
          DB::table('skpd_pembiayaan_histories')->where('skpd_pembiayaan_id', $id)->delete();
          DB::table('skpd_fotos')->where('skpd_pembiayaan_id', $id)->delete();
          DB::table('skpd_deviasis')->where('skpd_pembiayaan_id', $id)->delete();
          DB::table('skpd_slik_pasangans')->where('skpd_pembiayaan_id', $id)->delete();
          DB::table('skpd_sliks')->where('skpd_pembiayaan_id', $id)->delete();
          DB::table('skpd_jaminans')->where('skpd_pembiayaan_id', $id)->delete();
          DB::table('skpd_jaminan_lainnyas')->where('skpd_pembiayaan_id', $id)->delete();
          DB::table('skpd_pembiayaans')->where('id', $id)->delete();
     }

     private function destroyUmkm(int $id): void
     {
          DB::table('umkm_pembiayaan_histories')->where('umkm_pembiayaan_id', $id)->delete();
          DB::table('umkm_fotos')->where('umkm_pembiayaan_id', $id)->delete();
          DB::table('umkm_deviasis')->where('umkm_pembiayaan_id', $id)->delete();
          DB::table('umkm_slik_pasangans')->where('umkm_pembiayaan_id', $id)->delete();
          DB::table('umkm_sliks')->where('umkm_pembiayaan_id', $id)->delete();
          DB::table('umkm_jaminans')->where('umkm_pembiayaan_id', $id)->delete();
          DB::table('umkm_jaminan_lains')->where('umkm_pembiayaan_id', $id)->delete();
          DB::table('umkm_keterangan_usahas')->where('umkm_pembiayaan_id', $id)->delete();
          DB::table('umkm_legalitas_rumahs')->where('umkm_pembiayaan_id', $id)->delete();
          DB::table('umkm_pembiayaans')->where('id', $id)->delete();
     }

     private function destroyP3k(int $id): void
     {
          DB::table('p3k_pembiayaan_histories')->where('p3k_pembiayaan_id', $id)->delete();
          DB::table('p3k_fotos')->where('p3k_pembiayaan_id', $id)->delete();
          DB::table('p3k_deviasis')->where('p3k_pembiayaan_id', $id)->delete();
          DB::table('p3k_slik_pasangans')->where('p3k_pembiayaan_id', $id)->delete();
          DB::table('p3k_sliks')->where('p3k_pembiayaan_id', $id)->delete();
          DB::table('p3k_pembiayaans')->where('id', $id)->delete();
     }

     private function destroyPpr(int $id): void
     {
          // Get FK IDs stored in form_ppr_pembiayaans before deleting
          $ppr = DB::table('form_ppr_pembiayaans')->where('id', $id)->first();
          if (!$ppr) {
               return;
          }

          // Delete all records with form_ppr_pembiayaan_id FK
          $pprTables = [
               'ppr_pembiayaan_histories',
               'ppr_ability_to_repay_fixed_incomes',
               'ppr_ability_to_repay_non_fixed_incomes',
               'ppr_lampirans',
               'ppr_characters',
               'ppr_character_non_fixeds',
               'ppr_capacities',
               'ppr_capacity_non_fixeds',
               'ppr_capitals',
               'ppr_conditions',
               'ppr_condition_non_fixeds',
               'ppr_collaterals',
               'ppr_collateral_non_fixeds',
               'ppr_cl_persyaratans',
               'ppr_cl_dokumen_agunans',
               'ppr_cl_dokumen_fixed_incomes',
               'ppr_cl_dokumen_non_fixed_incomes',
               'ppr_scoring_atr_fixed_incomes',
               'ppr_scoring_wtr_fixed_incomes',
               'ppr_scoring_collateral_fixed_incomes',
               'ppr_scoring_atr_non_fixed_incomes',
               'ppr_scoring_wtr_non_fixed_incomes',
               'ppr_scoring_collateral_non_fixed_incomes',
               'ppr_pemberkasan_memos',
               'ppr_cl_dokumens',
               'ppr_scorings',
          ];
          foreach ($pprTables as $table) {
               DB::table($table)->where('form_ppr_pembiayaan_id', $id)->delete();
          }

          // Delete the main record
          DB::table('form_ppr_pembiayaans')->where('id', $id)->delete();

          // Delete orphaned FK-referenced records
          if (!empty($ppr->form_ppr_data_pribadi_id)) {
               DB::table('form_ppr_data_pribadis')->where('id', $ppr->form_ppr_data_pribadi_id)->delete();
          }
          if (!empty($ppr->form_ppr_data_pekerjaan_id)) {
               DB::table('form_ppr_data_pekerjaans')->where('id', $ppr->form_ppr_data_pekerjaan_id)->delete();
          }
          if (!empty($ppr->form_ppr_data_agunan_id)) {
               DB::table('form_ppr_data_agunans')->where('id', $ppr->form_ppr_data_agunan_id)->delete();
          }
     }
}
