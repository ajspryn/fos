<?php

namespace Modules\Kabag\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Pasar\Entities\PasarPembiayaan;


class PasarProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(){
        $proposal=PasarPembiayaan::select()->get();
        return view('kabag::pasar.proposal.index',[
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
        $data = PasarPembiayaan::select('id', 'created_at')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
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

        return view('kabag::pasar.index',[
            'title' => 'Dasboard Kabag',
            'data' => $data,
            'bulans' => $bulans,
            'hitungBulan' => $hitungBulan,
            'labels' => $labels,
            'datapasar' => $datapasar,
            'plabels' => $plabel,
            'pdatapasars' => $pdatapasar,

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
        return view('kabag::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('kabag::edit');
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
