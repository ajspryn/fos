<?php

namespace Modules\Dirbis\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

class UmkmProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $komite=UmkmPembiayaanHistory::select()->get();
        return view('dirbis::umkm.proposal.index',[
        'title'=>'Data Nasabah',
        'proposals'=>$komite,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        {
        

            $data = UmkmPembiayaan::select('id', 'created_at')->get()->groupBy(function ($data) {
                return Carbon::parse($data->created_at)->format('M');
            });
    
            $bulans = [];
            $hitungBulan = [];
            foreach ($data as $bulan => $values) {
                $bulans[] = $bulan;
                $hitungBulan[] = count($values);
            }
    
            $plafonds = UmkmPembiayaan::join('umkm_pembiayaan_histories','umkm_pembiayaans.id','=','umkm_pembiayaan_histories.umkm_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(umkm_pembiayaans.tgl_pembiayaan) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
            ->where('umkm_pembiayaan_histories.jabatan_id', 4)
            ->where('umkm_pembiayaan_histories.status_id', 5)
            ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('umkm_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');
    
       
            $bulanplafonds = $plafonds->keys();
            $hitungPerBulan = $plafonds->values();
    
            $noas = UmkmPembiayaan::select(DB::raw("MONTHNAME(umkm_pembiayaans.tgl_pembiayaan) as nama_bulan, count(nasabah_id) as noa"))
            ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('umkm_pembiayaans.id', 'ASC')
            ->pluck('noa', 'nama_bulan');
            
            $bulannoas = $noas->keys();
            $noaPerBulan = $noas->values();
    
          
            // return ($noas);
            return view('dirbis::umkm.index', [
                'title' => 'Dashboard UMKM',
                'data' => $data,
                'bulans' => $bulans,
                'hitungBulan' => $hitungBulan,
                'plafond' => $hitungBulan,
                'labelplafonds'=>$bulanplafonds,
                'dataplafonds'=>$hitungPerBulan,
                'labelnoas'=>$bulannoas,
                'datanoas'=>$noaPerBulan,
            ]);
        }
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
