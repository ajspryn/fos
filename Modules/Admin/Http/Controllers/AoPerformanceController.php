<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AoPerformanceController extends Controller
{
    public function index(): Renderable
    {
        // Gabung data pengajuan dari semua 5 modul per AO (user_id)
        $pasarQ = DB::table('pasar_pembiayaans AS pp')
            ->select('pp.AO_id AS user_id', DB::raw("COUNT(*) AS total"), DB::raw("'Pasar' AS modul"))
            ->whereNotNull('pp.AO_id')
            ->groupBy('pp.AO_id');

        $skpdQ = DB::table('skpd_pembiayaans AS sp')
            ->select('sp.user_id', DB::raw("COUNT(*) AS total"), DB::raw("'SKPD' AS modul"))
            ->groupBy('sp.user_id');

        $umkmQ = DB::table('umkm_pembiayaans AS up')
            ->select('up.AO_id AS user_id', DB::raw("COUNT(*) AS total"), DB::raw("'UMKM' AS modul"))
            ->whereNotNull('up.AO_id')
            ->groupBy('up.AO_id');

        $p3kQ = DB::table('p3k_pembiayaans AS p3k')
            ->select('p3k.user_id', DB::raw("COUNT(*) AS total"), DB::raw("'P3K' AS modul"))
            ->groupBy('p3k.user_id');

        $pprQ = DB::table('form_ppr_pembiayaans AS ppr')
            ->select('ppr.user_id', DB::raw("COUNT(*) AS total"), DB::raw("'PPR' AS modul"))
            ->groupBy('ppr.user_id');

        // Kumpulkan per modul
        $rows = collect([])
            ->merge($pasarQ->get())
            ->merge($skpdQ->get())
            ->merge($umkmQ->get())
            ->merge($p3kQ->get())
            ->merge($pprQ->get());

        // Group by user_id
        $byUser = $rows->groupBy('user_id');

        // Build summary
        $modules = ['Pasar', 'SKPD', 'UMKM', 'P3K', 'PPR'];

        $summary = $byUser->map(function ($entries, $userId) use ($modules) {
            $perModul = [];
            $total = 0;
            foreach ($modules as $m) {
                $count = $entries->where('modul', $m)->sum('total');
                $perModul[$m] = $count;
                $total += $count;
            }
            return (object) array_merge(['user_id' => $userId, 'total' => $total], $perModul);
        })->sortByDesc('total')->values();

        // Attach user names
        $userIds = $summary->pluck('user_id')->filter()->unique()->all();
        $users = DB::table('users')->whereIn('id', $userIds)->pluck('name', 'id');

        return view('admin::ao-performance.index', compact('summary', 'users', 'modules'));
    }
}
