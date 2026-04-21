<?php

namespace Modules\Dirut\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Akad\Entities\Pembiayaan;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;

class P3kProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $userId = Auth::id();

        $proposalSelesais = Cache::remember('dirut:p3k:proposal-selesai', 300, function () {
            return P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
                ->select()
                ->where('p3k_pembiayaan_histories.status_id', 9)
                ->get();
        });

        $stats = Cache::remember("dirut:p3k:stats:user:{$userId}", 300, function () use ($userId) {
            $p3kLatestSub = DB::table('p3k_pembiayaan_histories')
                ->select('p3k_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                ->groupBy('p3k_pembiayaan_id');

            $proposalP3k = DB::query()
                ->fromSub($p3kLatestSub, 'pl')
                ->join('p3k_pembiayaan_histories as ph', 'ph.id', '=', 'pl.latest_id')
                ->where(function ($q) {
                    $q->where(function ($q2) {
                        $q2->where('ph.jabatan_id', 3)->where('ph.status_id', 5);
                    })->orWhere(function ($q2) {
                        $q2->where('ph.jabatan_id', 4)->where('ph.status_id', 4);
                    });
                })
                ->count();

            $ditolak = P3kPembiayaanHistory::where('status_id', 6)->count();

            $review = DB::query()
                ->fromSub($p3kLatestSub, 'pl2')
                ->join('p3k_pembiayaan_histories as ph2', 'ph2.id', '=', 'pl2.latest_id')
                ->join('p3k_pembiayaans as p3', 'p3.id', '=', 'pl2.p3k_pembiayaan_id')
                ->where('p3.user_id', $userId)
                ->whereNotNull('p3.dokumen_ideb')
                ->where('ph2.status_id', 7)
                ->count();

            $pipeline = DB::query()
                ->fromSub($p3kLatestSub, 'pl3')
                ->join('p3k_pembiayaan_histories as ph3', 'ph3.id', '=', 'pl3.latest_id')
                ->where('ph3.status_id', '<', 9)
                ->where(function ($q) {
                    $q->where('ph3.status_id', '!=', 5)->orWhere('ph3.jabatan_id', '!=', 4);
                })
                ->count();

            $diterima = Pembiayaan::where('segmen', 'P3K')
                ->where('status', 'Selesai Akad')
                ->count();

            $batalAkad = Pembiayaan::where('segmen', 'P3K')
                ->where('status', 'Akad Batal')
                ->count();

            return compact('proposalP3k', 'ditolak', 'review', 'pipeline', 'diterima', 'batalAkad');
        });

        //Query Chart Proposal Per Bulan
        $proposalPerBulan = P3kPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'nama_bulan');

        $bulans = $proposalPerBulan->keys();
        $hitungPerBulan = $proposalPerBulan->values();

        //Query Chart Plafond Per Bulan
        $plafondPerBulan = P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(p3k_pembiayaans.created_at) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
            ->where('p3k_pembiayaan_histories.status_id', 9)
            ->whereYear('p3k_pembiayaans.created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('p3k_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');

        $labelPlafond = $plafondPerBulan->keys();
        $dataPlafond = $plafondPerBulan->values();

        return view('dirut::p3k.index', [
            'title' => 'Dashboard Dirut',
            'proposalSelesais' => $proposalSelesais,
            'jmlDisburse' => $proposalSelesais->sum('nominal_pembiayaan'),
            'jmlMargin' => $proposalSelesais->sum('harga_margin'),
        ], compact(
            'bulans',
            'hitungPerBulan',
            'labelPlafond',
            'dataPlafond',
        ) + $stats);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dirut::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dirut::edit');
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
