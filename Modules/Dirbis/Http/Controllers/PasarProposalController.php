<?php

namespace Modules\Dirbis\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Pasar\Entities\PasarPembiayaan;

class PasarProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $proposal=PasarPembiayaan::select()->get();
        return view('dirbis::pasar.proposal.index',[
            'title'=>'Data Nasabah',
            'proposals'=>$proposal,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
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
        $plafonds = PasarPembiayaan::join('pasar_pembiayaan_histories','pasar_pembiayaans.id','=','pasar_pembiayaan_histories.pasar_pembiayaan_id')
        ->select(DB::raw("MONTHNAME(pasar_pembiayaans.tgl_pembiayaan) as nama_bulan, sum(harga) as jml_plafond"))
        ->where('pasar_pembiayaan_histories.status_id', 9)
        ->whereYear('pasar_pembiayaans.tgl_pembiayaan', date('Y'))
        ->groupBy(DB::raw("nama_bulan"))
        ->orderBy('pasar_pembiayaans.id', 'ASC')
        ->pluck('jml_plafond', 'nama_bulan');

   
        $bulanplafonds = $plafonds->keys();
        $hitungPerBulan = $plafonds->values();

        $target1 = PasarPembiayaan::join('pasar_pembiayaan_histories','pasar_pembiayaans.id','=','pasar_pembiayaan_histories.pasar_pembiayaan_id')
        ->select()
        ->where('pasar_pembiayaan_histories.status_id', 9)
        ->whereYear('pasar_pembiayaans.tgl_pembiayaan', date('Y'))
        ->get();

        $pipeline = PasarPembiayaan::select()
        ->whereYear('tgl_pembiayaan', date('Y'))
        ->count();


        // return (  $plafonds);
        return view('dirbis::pasar.index', [
            'title' => 'Dashboard Pasar',
            'data' => $data,
            'bulans' => $bulans,
            'hitungBulan' => $hitungBulan,
            'labels' => $labels,
            'datapasar' => $datapasar,
            'plabels' => $plabel,
            'pdatapasars' => $pdatapasar,
            'labelplafonds'=>$bulanplafonds,
            'dataplafonds'=>$hitungPerBulan,
            'pipeline'=>$pipeline,
            'target1'=>$target1,

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
