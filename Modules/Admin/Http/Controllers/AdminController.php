<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\P3k\Entities\P3kPembiayaan;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roleRecord       = Role::where('user_id', Auth::user()->id)->first();
        $userTidakAdaRole = Role::rightJoin('users', 'roles.user_id', '=', 'users.id')->whereNull('role_id')->count();
        $userLengkap      = User::count();

        $today      = now()->toDateString();
        $todayPasar = DB::table('pasar_pembiayaans')->whereDate('tgl_pembiayaan', $today)->count();
        $todaySkpd  = DB::table('skpd_pembiayaans')->whereDate('tanggal_pengajuan', $today)->count();
        $todayUmkm  = DB::table('umkm_pembiayaans')->whereDate('tgl_pembiayaan', $today)->count();
        $todayP3k   = DB::table('p3k_pembiayaans')->whereDate('tanggal_pengajuan', $today)->count();
        $todayPpr   = DB::table('form_ppr_pembiayaans')->whereDate('created_at', $today)->count();
        $todayTotal = $todayPasar + $todaySkpd + $todayUmkm + $todayP3k + $todayPpr;

        // Distribusi status terkini lintas modul
        $statusDist = DB::select("
            SELECT st.keterangan, COUNT(*) as total
            FROM (
                SELECT MAX(ph.id) as lid FROM pasar_pembiayaan_histories ph GROUP BY ph.pasar_pembiayaan_id
                UNION ALL SELECT MAX(sh.id) FROM skpd_pembiayaan_histories sh GROUP BY sh.skpd_pembiayaan_id
                UNION ALL SELECT MAX(uh.id) FROM umkm_pembiayaan_histories uh GROUP BY uh.umkm_pembiayaan_id
                UNION ALL SELECT MAX(p3h.id) FROM p3k_pembiayaan_histories p3h GROUP BY p3h.p3k_pembiayaan_id
                UNION ALL SELECT MAX(prh.id) FROM ppr_pembiayaan_histories prh GROUP BY prh.form_ppr_pembiayaan_id
            ) latest
            JOIN (
                SELECT id, status_id FROM pasar_pembiayaan_histories
                UNION ALL SELECT id, status_id FROM skpd_pembiayaan_histories
                UNION ALL SELECT id, status_id FROM umkm_pembiayaan_histories
                UNION ALL SELECT id, status_id FROM p3k_pembiayaan_histories
                UNION ALL SELECT id, status_id FROM ppr_pembiayaan_histories
            ) all_hist ON all_hist.id = latest.lid
            JOIN statuses st ON st.id = all_hist.status_id
            GROUP BY st.id, st.keterangan
            ORDER BY total DESC
            LIMIT 8
        ");

        // Aging: pengajuan belum selesai > 3 hari
        $agingResult = DB::select("
            SELECT COUNT(*) as total
            FROM (
                SELECT MAX(ph.id) as lid, pp.tgl_pembiayaan as tgl
                    FROM pasar_pembiayaan_histories ph
                    JOIN pasar_pembiayaans pp ON pp.id = ph.pasar_pembiayaan_id
                    GROUP BY ph.pasar_pembiayaan_id
                UNION ALL
                SELECT MAX(sh.id), sp.tanggal_pengajuan
                    FROM skpd_pembiayaan_histories sh
                    JOIN skpd_pembiayaans sp ON sp.id = sh.skpd_pembiayaan_id
                    GROUP BY sh.skpd_pembiayaan_id
                UNION ALL
                SELECT MAX(uh.id), up.tgl_pembiayaan
                    FROM umkm_pembiayaan_histories uh
                    JOIN umkm_pembiayaans up ON up.id = uh.umkm_pembiayaan_id
                    GROUP BY uh.umkm_pembiayaan_id
                UNION ALL
                SELECT MAX(p3h.id), p3.tanggal_pengajuan
                    FROM p3k_pembiayaan_histories p3h
                    JOIN p3k_pembiayaans p3 ON p3.id = p3h.p3k_pembiayaan_id
                    GROUP BY p3h.p3k_pembiayaan_id
                UNION ALL
                SELECT MAX(prh.id), fp.created_at
                    FROM ppr_pembiayaan_histories prh
                    JOIN form_ppr_pembiayaans fp ON fp.id = prh.form_ppr_pembiayaan_id
                    GROUP BY prh.form_ppr_pembiayaan_id
            ) latest
            JOIN (
                SELECT id, status_id FROM pasar_pembiayaan_histories
                UNION ALL SELECT id, status_id FROM skpd_pembiayaan_histories
                UNION ALL SELECT id, status_id FROM umkm_pembiayaan_histories
                UNION ALL SELECT id, status_id FROM p3k_pembiayaan_histories
                UNION ALL SELECT id, status_id FROM ppr_pembiayaan_histories
            ) all_hist ON all_hist.id = latest.lid
            WHERE all_hist.status_id NOT IN (5,6,9,10,11)
            AND DATEDIFF(NOW(), latest.tgl) > 3
        ");
        $agingCount = $agingResult[0]->total ?? 0;

        // AO Performance top 5
        $aoPerformance = DB::select("
            SELECT u.name, COUNT(*) as total
            FROM (
                SELECT AO_id as user_id FROM pasar_pembiayaans WHERE AO_id IS NOT NULL
                UNION ALL SELECT user_id FROM skpd_pembiayaans WHERE user_id IS NOT NULL
                UNION ALL SELECT AO_id FROM umkm_pembiayaans WHERE AO_id IS NOT NULL
                UNION ALL SELECT user_id FROM p3k_pembiayaans WHERE user_id IS NOT NULL
                UNION ALL SELECT user_id FROM form_ppr_pembiayaans WHERE user_id IS NOT NULL
            ) ao
            JOIN users u ON u.id = ao.user_id
            GROUP BY u.id, u.name
            ORDER BY total DESC
            LIMIT 5
        ");

        // 5 pengajuan terbaru
        $recentSubmissions = DB::select("
            SELECT * FROM (
                SELECT 'pasar' as type, pp.id, COALESCE(pnh.nama_nasabah, '-') as nama, DATE(pp.tgl_pembiayaan) as tgl
                    FROM pasar_pembiayaans pp LEFT JOIN pasar_nasabahhs pnh ON pnh.id = pp.nasabah_id
                UNION ALL
                SELECT 'skpd', sp.id, COALESCE(sn.nama_nasabah, '-'), DATE(sp.tanggal_pengajuan)
                    FROM skpd_pembiayaans sp LEFT JOIN skpd_nasabahs sn ON sn.id = sp.skpd_nasabah_id
                UNION ALL
                SELECT 'umkm', up.id, COALESCE(un.nama_nasabah, '-'), DATE(up.tgl_pembiayaan)
                    FROM umkm_pembiayaans up LEFT JOIN umkm_nasabahs un ON un.id = up.nasabah_id
                UNION ALL
                SELECT 'p3k', p3.id, COALESCE(pn.nama_nasabah, '-'), DATE(p3.tanggal_pengajuan)
                    FROM p3k_pembiayaans p3 LEFT JOIN p3k_nasabahs pn ON pn.id = p3.p3k_nasabah_id
                UNION ALL
                SELECT 'ppr', fp.id, COALESCE(pd.form_pribadi_pemohon_nama_lengkap, '-'), DATE(fp.created_at)
                    FROM form_ppr_pembiayaans fp LEFT JOIN form_ppr_data_pribadis pd ON pd.id = fp.form_ppr_data_pribadi_id
            ) AS combined
            ORDER BY tgl DESC
            LIMIT 5
        ");

        return view('admin::lihat', [
            'title'             => 'Dashboard Admin',
            'role'              => optional($roleRecord)->role_id,
            'user'              => Auth::user(),
            'usertidakadarole'  => $userTidakAdaRole,
            'userlengkap'       => $userLengkap,
            'totalPasar'        => PasarPembiayaan::count(),
            'totalSkpd'         => SkpdPembiayaan::count(),
            'totalUmkm'         => UmkmPembiayaan::count(),
            'totalPpr'          => FormPprPembiayaan::count(),
            'totalP3k'          => P3kPembiayaan::count(),
            'todayTotal'        => $todayTotal,
            'todayPasar'        => $todayPasar,
            'todaySkpd'         => $todaySkpd,
            'todayUmkm'         => $todayUmkm,
            'todayP3k'          => $todayP3k,
            'todayPpr'          => $todayPpr,
            'statusDist'        => $statusDist,
            'agingCount'        => $agingCount,
            'aoPerformance'     => $aoPerformance,
            'recentSubmissions' => $recentSubmissions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
