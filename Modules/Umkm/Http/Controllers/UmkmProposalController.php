<?php

namespace Modules\Umkm\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\PasarAkad;
use Modules\Admin\Entities\PasarCashPick;
use Modules\Admin\Entities\PasarJaminanRumahh;
use Modules\Admin\Entities\PasarJenisDagang;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Admin\Entities\PasarJenisNasabah;
use Modules\Admin\Entities\PasarJenisPasar;
use Modules\Admin\Entities\PasarLamaBerdagang;
use Modules\Admin\Entities\PasarSektorEkonomi;
use Modules\Admin\Entities\PasarStatusPerkawinan;
use Modules\Admin\Entities\PasarSukuBangsa;
use Modules\Admin\Entities\PasarTanggungan;
use Modules\Umkm\Entities\UmkmFoto;
use Modules\Umkm\Entities\UmkmKeteranganUsaha;
use Modules\Umkm\Entities\UmkmLegalitasRumah;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;
use Modules\Umkm\Entities\UmkmSlik;

class UmkmProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('umkm::proposal.index',[
            'title'=>'Data Nasabah',
            'proposals'=>UmkmPembiayaan::select()->where('AO_id',Auth::user()->id)->where('sektor_id',null)->get(),
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
        $pembiayaan=UmkmPembiayaan::select()->where('id',$id)->get()->first();
        return view('umkm::proposal.lihat',[
            'title'=>'Detail Calon Nasabah',
            'pembiayaan'=>UmkmPembiayaan::select()->where('id',$id)->get()->first(),
            'nasabah'=>UmkmNasabah::select()->where('id',$id)->get()->first(),
            'fotodiri'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Diri')->get()->first(),
            'fotoktp'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto KTP')->get()->first(),
            'fotodiribersamaktp'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Diri Bersama KTP')->get()->first(),
            'fototoko'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto toko')->get()->first(),
            'usahas'=>UmkmKeteranganUsaha::all(), //udah
            'akads'=>PasarAkad::all(),
            'sektors'=>PasarSektorEkonomi::all(),
            'lamas'=>PasarLamaBerdagang::all(),
            'rumahs'=>PasarJaminanRumahh::all(),
            'dagangs'=>PasarJenisDagang::all(),
            'aos'=>Role::select()->where('user_id', $pembiayaan->AO_id)->get(),
            'cashs'=>PasarCashPick::all(),
            'jaminans'=>PasarJenisJaminan::all(),
            'nasabahs'=>PasarJenisNasabah::all(),
            'sukus'=>PasarSukuBangsa::all(),
            'pasars'=>PasarJenisPasar::all(),
            'dagangs'=>PasarJenisDagang::all(),
            'aos'=>Role::select()->where('jabatan_id',1)->get(),
            'tanggungans'=>PasarTanggungan::all(),
            'statuss'=>PasarStatusPerkawinan::all(),
            'rumah'=>UmkmLegalitasRumah::select()->where('umkm_pembiayaan_id',$pembiayaan->umkm_legalitas_rumah_id)->get()->first(),
        ]);
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
    {  {
        // return $request;
        
        $dokumen_keuangan=$request->file('dokumen_keuangan')->store('umkm-dokumen-keuangan');

        UmkmPembiayaan::where('id',$id)
                        ->update([
                            'sektor_id'=>$request->sektor_id,
                            'akad_id'=>$request->akad_id,
                            'tenor'=>$request->tenor,
                            'nominal_pembiayaan'=>str_replace(",","",$request->nominal_pembiayaan),
                            'cashpickup'=>$request->cashpickup,
                            'nasabah'=>$request->nasabah,
                            'rate'=>$request->rate,
                            'dokumen_keuangan'=>$dokumen_keuangan,
                        ]);
        UmkmNasabah::where('id',$id)
                    ->update([
                        'alamat_domisili'=>$request->alamat_domisili,
                        'npwp'=>$request->npwp,
                    ]);
        
        UmkmKeteranganUsaha::where('id',$id)
        ->update([
            'suku_bangsa_id'=>$request->suku_bangsa_id,
    
        ]);

        UmkmPembiayaanHistory::create([
            'umkm_pembiayaan_id'=> $id,
            'status_id'=> 2,
            'jabatan_id'=> 1 , 
            'divisi_id'=> 3 , 
            'user_id'=> Auth::user()->id,
        ]);

        if ($request->slik[0]['nama_bank']){

            // return $request->slik[0]['nama_bank'];
            foreach ($request->slik as $key => $value) {


            // return $value;
            UmkmSlik::create([
                'umkm_pembiayaan_id'=>$id,
                'nama_bank'=> $value['nama_bank'],
                'plafond'=> $value['plafond'],
                'outstanding'=> $value['outstanding'],
                'tenor'=> $value['tenor'],
                'margin'=> $value['margin'],
                'angsuran'=> $value['angsuran'],
                'agunan'=> $value['agunan'],
                'kol'=> $value['kol'],
            ]);
        }
    }
        return redirect('/umkm/komite/'.$id)->with('success', 'Proposal Pengajuan Sedang Dalam Proses Komite');

}
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
