<?php

namespace Modules\Umkm\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        

        $data = UmkmPembiayaan::select('id', 'tgl_pembiayaan')->where('AO_id', Auth::user()->id)->get()->groupBy(function ($data) {
            return Carbon::parse($data->tgl_pembiayaan)->format('M');
        });

        $bulans = [];
        $hitungBulan = [];
        foreach ($data as $bulan => $values) {
            $bulans[] = $bulan;
            $hitungBulan[] = count($values);
        }

        // $plafonds = UmkmPembiayaan::select(DB::raw("MONTHNAME(umkm_pembiayaans.tgl_pembiayaan) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
        // ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
        // ->groupBy(DB::raw("nama_bulan"))
        // ->orderBy('umkm_pembiayaans.id', 'ASC')
        // ->pluck('jml_plafond', 'nama_bulan');

        $plafonds = UmkmPembiayaan::join('umkm_pembiayaan_histories','umkm_pembiayaans.id','=','umkm_pembiayaan_histories.umkm_pembiayaan_id')
        ->select(DB::raw("MONTHNAME(umkm_pembiayaans.tgl_pembiayaan) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
        ->where('umkm_pembiayaans.AO_id',  Auth::user()->id)
        ->where('umkm_pembiayaan_histories.status_id', 9)
        ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
        ->groupBy(DB::raw("nama_bulan"))
        ->orderBy('umkm_pembiayaans.id', 'ASC')
        ->pluck('jml_plafond', 'nama_bulan');
   
        $bulanplafonds = $plafonds->keys();
        $hitungPerBulan = $plafonds->values();

        $noas = UmkmPembiayaan::select(DB::raw("MONTHNAME(umkm_pembiayaans.tgl_pembiayaan) as nama_bulan, count(nasabah_id) as noa"))
        ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
        ->groupBy(DB::raw("nama_bulan"))
        ->pluck('noa', 'nama_bulan');

        $bulannoas = $noas->keys();
        $noaPerBulan = $noas->values();

        
        $target1 = UmkmPembiayaan::join('umkm_pembiayaan_histories','umkm_pembiayaans.id','=','umkm_pembiayaan_histories.umkm_pembiayaan_id')
        ->select()
        ->where('umkm_pembiayaans.AO_id',  Auth::user()->id)
        ->where('umkm_pembiayaan_histories.status_id', 9)
        ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
        ->get();

        $pipeline = UmkmPembiayaan::select()
        ->where('AO_id',  Auth::user()->id)
        ->whereYear('tgl_pembiayaan', date('Y'))
        ->count();

      
        // return ($pipeline);
        return view('umkm::index', [
            'title' => 'Dashboard UMKM',
            'data' => $data,
            'bulans' => $bulans,
            'hitungBulan' => $hitungBulan,
            'plafond' => $hitungBulan,
            'labelplafonds'=>$bulanplafonds,
            'dataplafonds'=>$hitungPerBulan,
            'labelnoas'=>$bulannoas,
            'datanoas'=>$noaPerBulan,
            'target1'=>$target1,
            'pipeline'=>$pipeline,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('umkm::create');
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
        return view('umkm::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('umkm::edit');
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
