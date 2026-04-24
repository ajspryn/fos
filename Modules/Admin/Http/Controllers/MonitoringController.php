<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\AdminActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\PasarAkad;
use Modules\Admin\Entities\PasarCashPick;
use Modules\Admin\Entities\PasarJaminanRumahh;
use Modules\Admin\Entities\PasarJenisDagang;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Admin\Entities\PasarJenisNasabah;
use Modules\Admin\Entities\PasarLamaBerdagang;
use Modules\Admin\Entities\PasarScoreSlik;
use Modules\Admin\Entities\PasarSektorEkonomi;
use Modules\Admin\Entities\PasarSukuBangsa;
use Modules\Admin\Entities\UmkmScoreIdir;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmDeviasi;
use Modules\Umkm\Entities\UmkmFoto;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmJaminanLain;
use Modules\Umkm\Entities\UmkmKeteranganUsaha;
use Modules\Umkm\Entities\UmkmLegalitasRumah;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;
use Modules\Umkm\Entities\UmkmSlik;
use Modules\Umkm\Entities\UmkmSlikPasangan;

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
               ->leftJoin('pasar_nasabahhs AS pnh', 'pnh.id', '=', 'pp.nasabah_id')
               ->leftJoin($phSub, 'phlat.pasar_pembiayaan_id', '=', 'pp.id')
               ->leftJoin('pasar_pembiayaan_histories AS ph', 'ph.id', '=', 'phlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'ph.status_id')
               ->select([
                    DB::raw("'pasar' AS type"),
                    'pp.id',
                    DB::raw("COALESCE(pnh.nama_nasabah, '-') AS nama_nasabah"),
                    DB::raw("COALESCE(pp.harga, 0) AS nominal"),
                    DB::raw("DATE(pp.tgl_pembiayaan) AS tanggal"),
                    DB::raw("COALESCE(st.keterangan, '-') AS status"),
                    DB::raw("COALESCE(ph.status_id, 0) AS status_id"),
                    DB::raw("COALESCE(u.name, '-') AS ao_name"),
                    DB::raw("DATEDIFF(NOW(), pp.tgl_pembiayaan) AS aging_days"),
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
                    DB::raw("DATEDIFF(NOW(), sp.tanggal_pengajuan) AS aging_days"),
               ]);

          // ── umkm ────────────────────────────────────────────────────────────
          $qUmkm = DB::table('umkm_pembiayaans AS up')
               ->leftJoin('users AS u', 'u.id', '=', 'up.AO_id')
               ->leftJoin('umkm_nasabahs AS un', 'un.id', '=', 'up.nasabah_id')
               ->leftJoin($uhSub, 'uhlat.umkm_pembiayaan_id', '=', 'up.id')
               ->leftJoin('umkm_pembiayaan_histories AS uh', 'uh.id', '=', 'uhlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'uh.status_id')
               ->select([
                    DB::raw("'umkm' AS type"),
                    'up.id',
                    DB::raw("COALESCE(un.nama_nasabah, '-') AS nama_nasabah"),
                    DB::raw("COALESCE(up.nominal_pembiayaan, 0) AS nominal"),
                    DB::raw("DATE(up.tgl_pembiayaan) AS tanggal"),
                    DB::raw("COALESCE(st.keterangan, '-') AS status"),
                    DB::raw("COALESCE(uh.status_id, 0) AS status_id"),
                    DB::raw("COALESCE(u.name, '-') AS ao_name"),
                    DB::raw("DATEDIFF(NOW(), up.tgl_pembiayaan) AS aging_days"),
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
                    DB::raw("DATEDIFF(NOW(), p3.tanggal_pengajuan) AS aging_days"),
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
                    DB::raw("DATEDIFF(NOW(), fp.created_at) AS aging_days"),
               ]);

          // ── apply search on each sub-query's name column ────────────────────
          if ($search) {
               $qPasar->where('pnh.nama_nasabah', 'like', "%{$search}%");
               $qSkpd->where('sn.nama_nasabah', 'like', "%{$search}%");
               $qUmkm->where('un.nama_nasabah', 'like', "%{$search}%");
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
      * Export monitoring sebagai CSV.
      */
     public function export(Request $request)
     {
          $type   = $request->type ?? 'semua';
          $search = $request->search;

          $phSub  = DB::raw('(SELECT pasar_pembiayaan_id, MAX(id) AS lid FROM pasar_pembiayaan_histories GROUP BY pasar_pembiayaan_id) AS phlat');
          $shSub  = DB::raw('(SELECT skpd_pembiayaan_id, MAX(id) AS lid FROM skpd_pembiayaan_histories GROUP BY skpd_pembiayaan_id) AS shlat');
          $uhSub  = DB::raw('(SELECT umkm_pembiayaan_id, MAX(id) AS lid FROM umkm_pembiayaan_histories GROUP BY umkm_pembiayaan_id) AS uhlat');
          $p3hSub = DB::raw('(SELECT p3k_pembiayaan_id, MAX(id) AS lid FROM p3k_pembiayaan_histories GROUP BY p3k_pembiayaan_id) AS p3hlat');
          $prSub  = DB::raw('(SELECT form_ppr_pembiayaan_id, MAX(id) AS lid FROM ppr_pembiayaan_histories GROUP BY form_ppr_pembiayaan_id) AS prlat');

          $cols = [
               DB::raw("type"),
               'id',
               DB::raw("nama_nasabah"),
               DB::raw("nominal"),
               DB::raw("tanggal"),
               DB::raw("status"),
               DB::raw("ao_name"),
               DB::raw("aging_days"),
          ];

          $qPasar = DB::table('pasar_pembiayaans AS pp')
               ->leftJoin('users AS u', 'u.id', '=', 'pp.AO_id')
               ->leftJoin('pasar_nasabahhs AS pnh', 'pnh.id', '=', 'pp.nasabah_id')
               ->leftJoin($phSub, 'phlat.pasar_pembiayaan_id', '=', 'pp.id')
               ->leftJoin('pasar_pembiayaan_histories AS ph', 'ph.id', '=', 'phlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'ph.status_id')
               ->select([DB::raw("'pasar' AS type"), 'pp.id', DB::raw("COALESCE(pnh.nama_nasabah,'-') AS nama_nasabah"), DB::raw("COALESCE(pp.harga,0) AS nominal"), DB::raw("DATE(pp.tgl_pembiayaan) AS tanggal"), DB::raw("COALESCE(st.keterangan,'-') AS status"), DB::raw("COALESCE(u.name,'-') AS ao_name"), DB::raw("DATEDIFF(NOW(),pp.tgl_pembiayaan) AS aging_days")]);
          $qSkpd = DB::table('skpd_pembiayaans AS sp')
               ->leftJoin('users AS u', 'u.id', '=', 'sp.user_id')
               ->leftJoin('skpd_nasabahs AS sn', 'sn.id', '=', 'sp.skpd_nasabah_id')
               ->leftJoin($shSub, 'shlat.skpd_pembiayaan_id', '=', 'sp.id')
               ->leftJoin('skpd_pembiayaan_histories AS sh', 'sh.id', '=', 'shlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'sh.status_id')
               ->select([DB::raw("'skpd' AS type"), 'sp.id', DB::raw("COALESCE(sn.nama_nasabah,'-') AS nama_nasabah"), DB::raw("COALESCE(sp.nominal_pembiayaan,0) AS nominal"), DB::raw("DATE(sp.tanggal_pengajuan) AS tanggal"), DB::raw("COALESCE(st.keterangan,'-') AS status"), DB::raw("COALESCE(u.name,'-') AS ao_name"), DB::raw("DATEDIFF(NOW(),sp.tanggal_pengajuan) AS aging_days")]);
          $qUmkm = DB::table('umkm_pembiayaans AS up')
               ->leftJoin('users AS u', 'u.id', '=', 'up.AO_id')
               ->leftJoin('umkm_nasabahs AS un', 'un.id', '=', 'up.nasabah_id')
               ->leftJoin($uhSub, 'uhlat.umkm_pembiayaan_id', '=', 'up.id')
               ->leftJoin('umkm_pembiayaan_histories AS uh', 'uh.id', '=', 'uhlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'uh.status_id')
               ->select([DB::raw("'umkm' AS type"), 'up.id', DB::raw("COALESCE(un.nama_nasabah,'-') AS nama_nasabah"), DB::raw("COALESCE(up.nominal_pembiayaan,0) AS nominal"), DB::raw("DATE(up.tgl_pembiayaan) AS tanggal"), DB::raw("COALESCE(st.keterangan,'-') AS status"), DB::raw("COALESCE(u.name,'-') AS ao_name"), DB::raw("DATEDIFF(NOW(),up.tgl_pembiayaan) AS aging_days")]);
          $qP3k = DB::table('p3k_pembiayaans AS p3')
               ->leftJoin('users AS u', 'u.id', '=', 'p3.user_id')
               ->leftJoin('p3k_nasabahs AS pn', 'pn.id', '=', 'p3.p3k_nasabah_id')
               ->leftJoin($p3hSub, 'p3hlat.p3k_pembiayaan_id', '=', 'p3.id')
               ->leftJoin('p3k_pembiayaan_histories AS p3h', 'p3h.id', '=', 'p3hlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'p3h.status_id')
               ->select([DB::raw("'p3k' AS type"), 'p3.id', DB::raw("COALESCE(pn.nama_nasabah,'-') AS nama_nasabah"), DB::raw("COALESCE(p3.nominal_pembiayaan,0) AS nominal"), DB::raw("DATE(p3.tanggal_pengajuan) AS tanggal"), DB::raw("COALESCE(st.keterangan,'-') AS status"), DB::raw("COALESCE(u.name,'-') AS ao_name"), DB::raw("DATEDIFF(NOW(),p3.tanggal_pengajuan) AS aging_days")]);
          $qPpr = DB::table('form_ppr_pembiayaans AS fp')
               ->leftJoin('users AS u', 'u.id', '=', 'fp.user_id')
               ->leftJoin('form_ppr_data_pribadis AS pd', 'pd.id', '=', 'fp.form_ppr_data_pribadi_id')
               ->leftJoin($prSub, 'prlat.form_ppr_pembiayaan_id', '=', 'fp.id')
               ->leftJoin('ppr_pembiayaan_histories AS prh', 'prh.id', '=', 'prlat.lid')
               ->leftJoin('statuses AS st', 'st.id', '=', 'prh.status_id')
               ->select([DB::raw("'ppr' AS type"), 'fp.id', DB::raw("COALESCE(pd.form_pribadi_pemohon_nama_lengkap,'-') AS nama_nasabah"), DB::raw("COALESCE(fp.form_permohonan_nilai_ppr_dimohon,0) AS nominal"), DB::raw("DATE(fp.created_at) AS tanggal"), DB::raw("COALESCE(st.keterangan,'-') AS status"), DB::raw("COALESCE(u.name,'-') AS ao_name"), DB::raw("DATEDIFF(NOW(),fp.created_at) AS aging_days")]);

          if ($search) {
               $qPasar->where('pnh.nama_nasabah', 'like', "%{$search}%");
               $qSkpd->where('sn.nama_nasabah', 'like', "%{$search}%");
               $qUmkm->where('un.nama_nasabah', 'like', "%{$search}%");
               $qP3k->where('pn.nama_nasabah', 'like', "%{$search}%");
               $qPpr->where('pd.form_pribadi_pemohon_nama_lengkap', 'like', "%{$search}%");
          }

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
                    $union = $qPasar->unionAll($qSkpd)->unionAll($qUmkm)->unionAll($qP3k)->unionAll($qPpr);
                    break;
          }

          $data = DB::table(DB::raw("({$union->toSql()}) AS combined"))
               ->mergeBindings($union)
               ->orderByDesc('tanggal')
               ->get();

          $filename = 'monitoring_' . $type . '_' . date('Ymd_His') . '.csv';
          $headers  = [
               'Content-Type'        => 'text/csv; charset=UTF-8',
               'Content-Disposition' => 'attachment; filename="' . $filename . '"',
          ];

          $callback = function () use ($data) {
               $file = fopen('php://output', 'w');
               fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF)); // UTF-8 BOM
               fputcsv($file, ['#', 'Modul', 'Nama Nasabah', 'Nominal', 'Tanggal', 'Status', 'AO', 'Aging (Hari)']);
               foreach ($data as $i => $row) {
                    fputcsv($file, [
                         $i + 1,
                         strtoupper($row->type),
                         $row->nama_nasabah,
                         $row->nominal,
                         $row->tanggal,
                         $row->status,
                         $row->ao_name,
                         $row->aging_days ?? 0,
                    ]);
               }
               fclose($file);
          };

          return response()->stream($callback, 200, $headers);
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
          $data = UmkmPembiayaan::findOrFail($id);
          $nasabah      = UmkmNasabah::where('id', $data->nasabah_id)->first();
          $usaha        = UmkmKeteranganUsaha::where('umkm_pembiayaan_id', $id)->first();
          $jaminanrumah = UmkmLegalitasRumah::where('umkm_pembiayaan_id', $id)->first();
          $jaminanlain  = UmkmJaminan::where('umkm_pembiayaan_id', $id)->first();

          $tenor  = $data->tenor ?? 1;
          $harga  = $data->nominal_pembiayaan ?? 0;
          $rate   = $data->rate ?? 0;
          $margin = ($rate * $tenor) / 100;

          $harga_jual = ($harga * $margin) + $harga;
          $angsuran1  = $tenor > 0 ? (int)($harga_jual / $tenor) : 0;

          $omset       = $data->omset ?? 0;
          $hpp         = $data->hpp ?? 0;
          $listrik     = $data->listrik ?? 0;
          $transport   = $data->trasport ?? 0;
          $sewa        = $data->sewa ?? 0;
          $karyawan    = $data->karyawan ?? 0;
          $telpon      = $data->telpon ?? 0;
          $laba_bersih = $omset - ($hpp + $listrik + $sewa + $karyawan + $telpon + $transport);
          $total_pendapatan_bersih = $laba_bersih + ($data->pendapatan_lain ?? 0);

          $cicilan            = UmkmSlik::where('umkm_pembiayaan_id', $id)->sum('angsuran');
          $biaya_anak         = optional(optional($nasabah)->tanggungan)->biaya ?? 0;
          $biaya_istri        = optional(optional($nasabah)->status)->biaya ?? 0;
          $kebutuhan_keluarga = UmkmPembiayaan::where('id', $id)->sum('keb_keluarga');
          $pengeluaranlain    = $biaya_anak + $biaya_istri + $kebutuhan_keluarga;
          $total_pengeluaran  = $pengeluaranlain + $cicilan;

          $cekcicilanpasangan = UmkmSlikPasangan::where('umkm_pembiayaan_id', $id)->count();
          if ($cekcicilanpasangan > 0) {
               $cicilanpasangan   = UmkmSlikPasangan::where('umkm_pembiayaan_id', $id)->sum('angsuran');
               $cicilan           = $cicilan + $cicilanpasangan;
               $total_pengeluaran = $pengeluaranlain + $cicilan;
          }

          $di = $total_pendapatan_bersih - $total_pengeluaran;

          // Ratings
          $proses_jenisdagang  = $usaha ? PasarJenisDagang::where('kode_jenisdagang', $usaha->jenisdagang_id)->first() : null;
          $proses_sukubangsa   = $usaha ? PasarSukuBangsa::where('kode_suku', $usaha->suku_bangsa_id)->first() : null;
          $proses_lamadagang   = $usaha ? PasarLamaBerdagang::where('kode_lamaberdagang', $usaha->lama_usaha)->first() : null;
          $proses_jaminanrumah = $jaminanrumah ? PasarJaminanRumahh::where('kode_jaminan', $jaminanrumah->legalitas_kepemilikan_rumah)->first() : null;
          $proses_cashpickup   = PasarCashPick::where('kode_jeniscash', $data->cashpickup)->first();
          $proses_jenisnasabah = PasarJenisNasabah::where('kode_jenisnasabah', $data->nasabah)->first();
          $proses_jaminanlain  = $jaminanlain ? PasarJenisJaminan::where('kode_jaminan', $jaminanlain->jaminanlain)->first() : null;

          $score_jenisdagang  = optional($proses_jenisdagang)->rating ?? 0;
          $score_sukubangsa   = optional($proses_sukubangsa)->rating ?? 0;
          $score_lamadagang   = optional($proses_lamadagang)->rating ?? 0;
          $score_jaminanrumahr = optional($proses_jaminanrumah)->rating ?? 0;
          $score_cashpick     = optional($proses_cashpickup)->rating ?? 0;
          $score_jenisnasabah = optional($proses_jenisnasabah)->rating ?? 0;
          $score_jaminanlain  = optional($proses_jaminanlain)->rating ?? 0;

          $idir_val = ($di > 0 && $angsuran1 > 0) ? (int)(($angsuran1 / $di) * 100) : 0;
          if ($idir_val <= 50)             $proses_idir = UmkmScoreIdir::where('rating', 4)->first();
          elseif ($idir_val <= 60)         $proses_idir = UmkmScoreIdir::where('rating', 3)->first();
          elseif ($idir_val <= 69)         $proses_idir = UmkmScoreIdir::where('rating', 2)->first();
          else                             $proses_idir = UmkmScoreIdir::where('rating', 1)->first();
          $score_idir = optional($proses_idir)->rating ?? 0;

          $data_slik = UmkmSlik::where('umkm_pembiayaan_id', $id)->orderBy('kol', 'desc')->first();
          $prosesslik = $data_slik
               ? PasarScoreSlik::where('kol', $data_slik->kol)->first()
               : PasarScoreSlik::whereNull('kol')->first();
          $score_slik = optional($prosesslik)->rating ?? 0;

          $waktuawal    = UmkmPembiayaanHistory::where('umkm_pembiayaan_id', $id)->orderBy('created_at', 'asc')->first();
          $waktuakhir   = UmkmPembiayaanHistory::where('umkm_pembiayaan_id', $id)->orderBy('created_at', 'desc')->first();
          $totalwaktu   = ($waktuawal && $waktuakhir)
               ? Carbon::parse($waktuawal->created_at)->diffAsCarbonInterval(Carbon::parse($waktuakhir->created_at))
               : null;

          return view('kabag::umkm.komite.lihat', [
               'title'            => 'Detail Proposal UMKM',
               'jabatan'          => Role::where('user_id', auth()->id())->first(),
               'timelines'        => UmkmPembiayaanHistory::where('umkm_pembiayaan_id', $id)->get(),
               'history'          => UmkmPembiayaanHistory::where('umkm_pembiayaan_id', $id)->orderBy('created_at', 'desc')->first(),
               'pembiayaan'       => $data,
               'nasabah'          => $nasabah,
               'fotos'            => UmkmFoto::where('umkm_pembiayaan_id', $id)->get(),
               'fototoko'         => UmkmFoto::where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto toko')->first(),
               'fotodiri'         => UmkmFoto::where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->first(),
               'fotoktp'          => UmkmFoto::where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
               'bon_murabahah'    => UmkmFoto::where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Bon Murabahah')->first(),
               'fotodiribersamaktp' => UmkmFoto::where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Diri Bersama KTP')->first(),
               'fotokk'           => UmkmFoto::where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
               'nota'             => UmkmFoto::where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Nota Pembelanjaan')->first(),
               'jaminanusahas'    => UmkmJaminan::where('umkm_pembiayaan_id', $id)->get(),
               'jaminanlainusahas' => UmkmJaminanLain::where('umkm_pembiayaan_id', $id)->get(),
               'usahas'           => UmkmKeteranganUsaha::all(),
               'akads'            => PasarAkad::all(),
               'sektors'          => PasarSektorEkonomi::all(),
               'lamas'            => $usaha ? PasarLamaBerdagang::where('kode_lamaberdagang', $usaha->lama_usaha)->first() : null,
               'rumahs'           => $jaminanrumah ? PasarJaminanRumahh::where('kode_jaminan', $jaminanrumah->legalitas_kepemilikan_rumah)->first() : null,
               'dagangs'          => $usaha ? PasarJenisDagang::where('kode_jenisdagang', $usaha->jenisdagang_id)->first() : null,
               'cashs'            => PasarCashPick::where('kode_jeniscash', $data->cashpickup)->first(),
               'nasabahs'         => PasarJenisNasabah::where('kode_jenisnasabah', $data->nasabah)->first(),
               'sukus'            => $usaha ? PasarSukuBangsa::where('kode_suku', $usaha->suku_bangsa_id)->first() : null,
               'jaminans'         => $jaminanlain ? (PasarJenisJaminan::where('kode_jaminan', $jaminanlain->jaminanlain)->first() ?? (object)['nama_jaminan' => '-', 'bobot' => 0]) : (object)['nama_jaminan' => '-', 'bobot' => 0],
               'idebs'            => UmkmSlik::where('umkm_pembiayaan_id', $id)->get(),
               'ideppasangans'    => UmkmSlikPasangan::where('umkm_pembiayaan_id', $id)->get(),
               'cicilanpasangans' => UmkmSlikPasangan::where('umkm_pembiayaan_id', $id)->get(),
               'ideb'             => UmkmPembiayaan::where('id', $id)->get(),
               'cekcicilanpasangan' => $cekcicilanpasangan,
               'laba_bersih'      => $laba_bersih,
               'total_pendapatan_bersih' => $total_pendapatan_bersih,
               'cicilan'          => $cicilan,
               'pengeluaran_lain' => $pengeluaranlain,
               'total_pengeluaran' => $total_pengeluaran,
               'angsuran'         => $angsuran1,
               'harga_jual'       => $harga_jual,
               'idir'             => $proses_idir,
               'nilai_idir'       => $idir_val,
               'slik'             => $prosesslik,
               'rating_jenisdagang'  => $score_jenisdagang,
               'rating_sukubangsa'   => $score_sukubangsa,
               'rating_lamadagang'   => $score_lamadagang,
               'rating_jaminanrumah' => $score_jaminanrumahr,
               'rating_cashpick'     => $score_cashpick,
               'rating_jenisnasabah' => $score_jenisnasabah,
               'rating_slik'         => $score_slik,
               'rating_idir'         => $score_idir,
               'rating_jaminanlain'  => $score_jaminanlain,
               'score_jenisdagang'   => $score_jenisdagang  * (optional($proses_jenisdagang)->bobot ?? 0),
               'score_sukubangsa'    => $score_sukubangsa   * (optional($proses_sukubangsa)->bobot ?? 0),
               'score_lamadagang'    => $score_lamadagang   * (optional($proses_lamadagang)->bobot ?? 0),
               'score_jaminanrumah'  => $score_jaminanrumahr * (optional($proses_jaminanrumah)->bobot ?? 0),
               'score_cashpick'      => $score_cashpick     * (optional($proses_cashpickup)->bobot ?? 0),
               'score_jenisnasabah'  => $score_jenisnasabah * (optional($proses_jenisnasabah)->bobot ?? 0),
               'score_slik'          => $score_slik         * (optional($prosesslik)->bobot ?? 0),
               'score_idir'          => $score_idir         * (optional($proses_idir)->bobot ?? 0),
               'score_jaminanlain'   => $score_jaminanlain  * (optional($proses_jaminanlain)->bobot ?? 0),
               'deviasi'          => UmkmDeviasi::where('umkm_pembiayaan_id', $id)->orderBy('created_at', 'desc')->first(),
               'totalwaktu'       => $totalwaktu,
               'arr'              => -2,
               'banyak_history'   => UmkmPembiayaanHistory::where('umkm_pembiayaan_id', $id)->count(),
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
               AdminActivityLog::log('delete', strtoupper($type), "Hapus pembiayaan {$type} ID={$id}");
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
