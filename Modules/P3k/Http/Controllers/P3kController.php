<?php

namespace Modules\P3k\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;

class P3kController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        //         //Query Chart Proposal Per Bulan
        //         $proposalPerBulan = P3kPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
        //             ->where('user_id', Auth::user()->id)
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(DB::raw("nama_bulan"))
        //             ->orderBy('id', 'ASC')
        //             ->pluck('count', 'nama_bulan');

        //         $bulans = $proposalPerBulan->keys();
        //         $hitungPerBulan = $proposalPerBulan->values();

        //         //Query Chart Plafond Per Bulan
        //         $plafondPerBulan = P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
        //             ->select(DB::raw("MONTHNAME(p3k_pembiayaans.created_at) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
        //             ->where('p3k_pembiayaans.user_id', Auth::user()->id)
        //             ->where('p3k_pembiayaan_histories.status_id', 9)
        //             ->whereYear('p3k_pembiayaans.created_at', date('Y'))
        //             ->groupBy(DB::raw("nama_bulan"))
        //             ->orderBy('p3k_pembiayaans.id', 'ASC')
        //             ->pluck('jml_plafond', 'nama_bulan');

        //         $labelPlafond = $plafondPerBulan->keys();
        //         $dataPlafond = $plafondPerBulan->values();

        $userId = Auth::id();
        $now = Carbon::now();

        $dashboardData = Cache::remember("p3k.dashboard.{$userId}." . $now->format('Y-m'), now()->addMinutes(5), function () use ($userId, $now) {
            // Proposal milik AO ini
            $myIds = P3kPembiayaan::where('user_id', $userId)->pluck('id');

            // Latest history per proposal
            $latestSub = P3kPembiayaanHistory::selectRaw('p3k_pembiayaan_id, MAX(id) as latest_id')
                ->groupBy('p3k_pembiayaan_id');

            $latestHistories = P3kPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
                $join->on('p3k_pembiayaan_histories.id', '=', 'lh.latest_id');
            })
                ->whereIn('p3k_pembiayaan_histories.p3k_pembiayaan_id', $myIds)
                ->get(['p3k_pembiayaan_histories.p3k_pembiayaan_id', 'status_id', 'jabatan_id']);

            // Cair bulan ini (status_id=9)
            $cairData = P3kPembiayaan::whereIn('id', $myIds)
                ->whereHas('histories', function ($q) use ($now) {
                    $q->where('status_id', 9)
                        ->whereYear('created_at', $now->year)
                        ->whereMonth('created_at', $now->month);
                })
                ->sum('nominal_pembiayaan');

            // Pipeline = masih berjalan, belum selesai/ditolak
            $pipeline = $latestHistories->filter(function ($h) {
                return $h->status_id < 9
                    && $h->status_id != 6
                    && !($h->status_id == 5 && $h->jabatan_id == 2);
            })->count();

            // Pengajuan = status_id=2 (AO submit, menunggu IDEB)
            $proposal = $latestHistories->where('status_id', 2)->count();

            // Revisi = status_id=7
            $review = $latestHistories->where('status_id', 7)->count();

            // Ditolak = proposal milik AO ini yang latest status = 6
            $ditolak = $latestHistories->where('status_id', 6)->count();

            // Selesai Akad = status_id=9
            $selesaiAkad = $latestHistories->where('status_id', 9)->count();

            // Batal Akad = status_id=10
            $batalAkad = $latestHistories->where('status_id', 10)->count();

            $targetNominal = 1000000000;

            return [
                'cair' => $cairData,
                'targetNominal' => $targetNominal,
                'pipeline' => $pipeline,
                'proposal' => $proposal,
                'review' => $review,
                'ditolak' => $ditolak,
                'selesaiAkad' => $selesaiAkad,
                'batalAkad' => $batalAkad,
            ];
        });

        return view('p3k::index', array_merge([
            'title' => 'Dashboard P3K',
        ], $dashboardData));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('p3k::create');
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
        return view('p3k::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('p3k::edit');
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
