<?php

namespace Modules\Dirut\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;

class SkpdProposalController extends Controller
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

        $stats = Cache::remember("dirut:skpd:stats:{$year}", 300, function () use ($year) {
            $skpdLatestSub = DB::table('skpd_pembiayaan_histories')
                ->select('skpd_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                ->groupBy('skpd_pembiayaan_id');

            $skpdHasStatus3 = DB::table('skpd_pembiayaan_histories')
                ->select('skpd_pembiayaan_id')
                ->where('status_id', 3)
                ->distinct();

            $a = DB::query()
                ->fromSub($skpdLatestSub, 'sl')
                ->join('skpd_pembiayaan_histories as sh', 'sh.id', '=', 'sl.latest_id')
                ->joinSub($skpdHasStatus3, 's3', 's3.skpd_pembiayaan_id', '=', 'sl.skpd_pembiayaan_id')
                ->where(function ($q) {
                    $q->where(function ($q2) {
                        $q2->where('sh.jabatan_id', 3)->where('sh.status_id', 5);
                    })->orWhere(function ($q2) {
                        $q2->where('sh.jabatan_id', 4)->where('sh.status_id', 4);
                    });
                })
                ->count();

            $diterima = SkpdPembiayaanHistory::where('status_id', 5)
                ->where('jabatan_id', 4)
                ->count();

            $ditolak = SkpdPembiayaanHistory::where('status_id', 6)->count();

            $revisi = SkpdPembiayaanHistory::where('status_id', 7)->count();

            $pipeline1 = DB::query()
                ->fromSub($skpdLatestSub, 'sl2')
                ->join('skpd_pembiayaan_histories as sh2', 'sh2.id', '=', 'sl2.latest_id')
                ->where('sh2.status_id', '!=', 9)
                ->where(function ($q) {
                    $q->where('sh2.status_id', '!=', 5)->orWhere('sh2.jabatan_id', '!=', 4);
                })
                ->count();

            $cair = SkpdPembiayaan::join('skpd_pembiayaan_histories', 'skpd_pembiayaans.id', '=', 'skpd_pembiayaan_histories.skpd_pembiayaan_id')
                ->where('skpd_pembiayaan_histories.jabatan_id', 4)
                ->where('skpd_pembiayaan_histories.status_id', 5)
                ->whereYear('skpd_pembiayaans.tanggal_pengajuan', $year)
                ->sum('nominal_pembiayaan');

            return compact('a', 'diterima', 'ditolak', 'revisi', 'pipeline1', 'cair');
        });

        $pasars = SkpdPembiayaan::selectRaw('count(id) as total, created_at')->groupBy('created_at')->get();

        $labels = [];
        $datapasar = [];
        foreach ($pasars as $pasar) {
            $labels[] = $pasar['created_at'];
            $datapasar[] = $pasar['total'];
        }


        //piechart 
        $rttotals = DB::table('skpd_instansis as jp')
            ->join('skpd_pembiayaans as pp', 'pp.skpd_instansi_id', '=', 'jp.id')
            ->select('jp.*', 'pp.*', DB::raw('count(*) as total_noa'))
            ->groupBy('pp.skpd_instansi_id')
            ->get();

        $plabel = [];
        $pdatainstansi = [];
        foreach ($rttotals as $rttotal) {
            $plabel[] = $rttotal->nama_instansi;
            $pdatainstansi[] = $rttotal->total_noa;
        }

        $plafonds = SkpdPembiayaan::join('skpd_pembiayaan_histories', 'skpd_pembiayaans.id', '=', 'skpd_pembiayaan_histories.skpd_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(skpd_pembiayaans.tanggal_pengajuan) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
            ->where('skpd_pembiayaan_histories.jabatan_id', 4)
            ->where('skpd_pembiayaan_histories.status_id', 5)
            ->whereYear('skpd_pembiayaans.tanggal_pengajuan', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('skpd_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');


        $bulanplafonds = $plafonds->keys();
        $hitungPerBulan = $plafonds->values();


        $data = SkpdPembiayaan::select('id', 'created_at')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
        });

        $bulans = [];
        $hitungBulan = [];
        foreach ($data as $bulan => $values) {
            $bulans[] = $bulan;
            $hitungBulan[] = count($values);
        }

        return view('dirut::skpd.index', [
            'title' => 'Dasboard Direksi SKPD',
            'labels' => $labels,
            'datainstansi' => $datapasar,
            'plabels' => $plabel,
            'pdatainstansis' => $pdatainstansi,
            'labelplafonds' => $bulanplafonds,
            'dataplafonds' => $hitungPerBulan,
            'bulans' => $bulans,
            'hitungBulan' => $hitungBulan
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
