<?php

namespace Modules\Dirbis\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;

class SkpdProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $proposal=SkpdPembiayaan::all();

        // return $proposal[0];

        return view('dirbis::skpd.proposal.index',[
            'title'=>'Proposal SKPD',
            'proposals'=>$proposal,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
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

        $plafonds = SkpdPembiayaan::join('skpd_pembiayaan_histories','skpd_pembiayaans.id','=','skpd_pembiayaan_histories.skpd_pembiayaan_id')
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

        $target1 = SkpdPembiayaan::join('skpd_pembiayaan_histories','skpd_pembiayaans.id','=','skpd_pembiayaan_histories.skpd_pembiayaan_id')
        ->select()
        ->where('skpd_pembiayaan_histories.jabatan_id', 4)
        ->where('skpd_pembiayaan_histories.status_id', 5)
        ->whereYear('skpd_pembiayaans.tanggal_pengajuan', date('Y'))
        ->get();

        $pipeline = SkpdPembiayaan::select()
        ->whereYear('tanggal_pengajuan', date('Y'))
        ->count();
        
        return view('dirbis::skpd.index',[
            'title' => 'Dasboard Direksi SKPD',
            'labels' => $labels,
            'datainstansi' => $datapasar,
            'plabels' => $plabel,
            'pdatainstansis' => $pdatainstansi,
            'labelplafonds'=>$bulanplafonds,
            'dataplafonds'=>$hitungPerBulan,
            'bulans'=>$bulans,
            'hitungBulan'=>$hitungBulan,
            'target1'=>$target1,
            'pipeline'=>$pipeline

        ]);
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
        return view('dirbis::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dirbis::edit');
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
