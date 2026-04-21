<?php

namespace Modules\Dirut\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;

class PasarProposalController extends Controller
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
        $year = date('Y');

        $stats = Cache::remember("dirut:pasar:stats:{$year}", 300, function () use ($year) {
            $pasarLatestSub = DB::table('pasar_pembiayaan_histories')
                ->select('pasar_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                ->groupBy('pasar_pembiayaan_id');

            $data = DB::query()
                ->fromSub($pasarLatestSub, 'pl')
                ->join('pasar_pembiayaan_histories as ph', 'ph.id', '=', 'pl.latest_id')
                ->where(function ($q) {
                    $q->where(function ($q2) {
                        $q2->where('ph.jabatan_id', 3)->where('ph.status_id', 5);
                    })->orWhere(function ($q2) {
                        $q2->where('ph.jabatan_id', 4)->where('ph.status_id', 4);
                    });
                })
                ->count();

            $diterima = DB::query()
                ->fromSub($pasarLatestSub, 'pl2')
                ->join('pasar_pembiayaan_histories as ph2', 'ph2.id', '=', 'pl2.latest_id')
                ->where('ph2.status_id', 5)
                ->where('ph2.jabatan_id', 4)
                ->count();

            $ditolak = PasarPembiayaanHistory::where('status_id', 6)->count();

            $review = DB::query()
                ->fromSub($pasarLatestSub, 'pl3')
                ->join('pasar_pembiayaan_histories as ph3', 'ph3.id', '=', 'pl3.latest_id')
                ->join('pasar_pembiayaans as p', 'p.id', '=', 'pl3.pasar_pembiayaan_id')
                ->whereNotNull('p.sektor_id')
                ->where('ph3.status_id', 7)
                ->count();

            $pipeline1 = DB::query()
                ->fromSub($pasarLatestSub, 'pl4')
                ->join('pasar_pembiayaan_histories as ph4', 'ph4.id', '=', 'pl4.latest_id')
                ->where('ph4.status_id', '!=', 9)
                ->where(function ($q) {
                    $q->where('ph4.status_id', '!=', 5)->orWhere('ph4.jabatan_id', '!=', 4);
                })
                ->count();

            $cair = PasarPembiayaan::join('pasar_pembiayaan_histories', 'pasar_pembiayaans.id', '=', 'pasar_pembiayaan_histories.pasar_pembiayaan_id')
                ->where('pasar_pembiayaan_histories.status_id', 9)
                ->whereYear('pasar_pembiayaans.tgl_pembiayaan', $year)
                ->sum('harga');

            return compact('data', 'diterima', 'ditolak', 'review', 'pipeline1', 'cair');
        });

        $data = PasarPembiayaan::select('id', 'tgl_pembiayaan')->get()->groupBy(function ($data) {
            return Carbon::parse($data->tgl_pembiayaan)->format('M');
        });

        $bulans = [];
        $hitungBulan = [];
        foreach ($data as $bulan => $values) {
            $bulans[] = $bulan;
            $hitungBulan[] = count($values);
        }

        $pasars = PasarPembiayaan::selectRaw('count(id) as total, created_at')->groupBy('created_at')->get();

        $labels = [];
        $datapasar = [];
        foreach ($pasars as $pasar) {
            $labels[] = $pasar['created_at'];
            $datapasar[] = $pasar['total'];
        }


        //piechart 
        $rttotals = DB::table('pasar_jenis_pasars as jp')
            ->join('pasar_keterangan_usahas as pk', 'pk.jenispasar_id', '=', 'jp.id')
            ->join('pasar_pembiayaans as pp', 'pp.id', '=', 'pk.pasar_pembiayaan_id')
            ->select('jp.*', 'pk.*', 'pp.*', DB::raw('count(*) as total_noa'))
            ->groupBy('pk.jenispasar_id')
            ->get();

        $plabel = [];
        $pdatapasar = [];
        foreach ($rttotals as $rttotal) {
            $plabel[] = $rttotal->nama_pasar;
            $pdatapasar[] = $rttotal->total_noa;
        }
        $plafonds = PasarPembiayaan::join('pasar_pembiayaan_histories', 'pasar_pembiayaans.id', '=', 'pasar_pembiayaan_histories.pasar_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(pasar_pembiayaans.tgl_pembiayaan) as nama_bulan, sum(harga) as jml_plafond"))
            ->where('pasar_pembiayaan_histories.status_id', 9)
            ->whereYear('pasar_pembiayaans.tgl_pembiayaan', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('pasar_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');


        $bulanplafonds = $plafonds->keys();
        $hitungPerBulan = $plafonds->values();

        // return (  $plafonds);
        return view('dirut::pasar.index', [
            'title' => 'Dashboard Pasar',
            'bulans' => $bulans,
            'hitungBulan' => $hitungBulan,
            'labels' => $labels,
            'datapasar' => $datapasar,
            'plabels' => $plabel,
            'pdatapasars' => $pdatapasar,
            'labelplafonds' => $bulanplafonds,
            'dataplafonds' => $hitungPerBulan,
        ] + $stats);
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
