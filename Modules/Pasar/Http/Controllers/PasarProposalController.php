<?php

namespace Modules\Pasar\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
use Modules\Admin\Entities\PasarSukuBangsa;
use Modules\Pasar\Entities\PasarDokumen;
use Modules\Pasar\Entities\PasarFoto;
use Modules\Pasar\Entities\PasarJaminan;
use Modules\Pasar\Entities\PasarJaminanLain;
use Modules\Pasar\Entities\PasarKeteranganUsaha;
use Modules\Pasar\Entities\PasarLegalitasRumah;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Pasar\Entities\PasarSlik;

class PasarProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('pasar::proposal.index',[
            'title'=>'Data Nasabah',
            'proposals'=>PasarPembiayaan::select()->where('AO_id',Auth::user()->id)->where('sektor_id',null)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('pasar::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {



    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data=PasarPembiayaan::select()->where('id',$id)->get()->first();
        $datafoto=PasarFoto::select()->where('pasar_pembiayaan_id',$id)->get();
        $foto=$datafoto;
        return view('pasar::proposal.lihat',[
            'title'=>'Detail Calon Nasabah',
            'pembiayaan'=>PasarPembiayaan::select()->where('id',$id)->get()->first(),
            'nasabah'=>PasarNasabahh::select()->where('id',$id)->get()->first(),
            'fotodiri'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto Diri')->get()->first(),
            'fotoktp'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto KTP')->get()->first(),
            'fotodiribersamaktp'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto Diri Bersama KTP')->get()->first(),
            'fotokk'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto Kartu Keluarga')->get()->first(),
            'fototoko'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto toko')->get()->first(),
            'usahas'=>PasarKeteranganUsaha::all(), //udah
            'akads'=>PasarAkad::all(),
            'sektors'=>PasarSektorEkonomi::all(),
            'pasars'=>PasarJenisPasar::all(),
            'lamas'=>PasarLamaBerdagang::all(),
            'rumahs'=>PasarJaminanRumahh::all(),
            'dagangs'=>PasarJenisDagang::all(),
            'aos'=>Role::select()->where('jabatan_id',1)->get(),
            'cashs'=>PasarCashPick::all(),
            'jaminans'=>PasarJenisJaminan::all(),
            'nasabahs'=>PasarJenisNasabah::all(),
            'sukus'=>PasarSukuBangsa::all(),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('pasar::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        {
            // return $request;

            $dokumen_keuangan=$request->file('dokumen_keuangan')->store('pasar-dokumen-keuangan');

            PasarPembiayaan::where('id',$id)
                            ->update([
                                'sektor_id'=>$request->sektor_id,
                                'akad_id'=>$request->akad_id,
                                'pesanan_blok'=>$request->pesanan_blok,
                                'tenor'=>$request->tenor,
                                'harga'=>str_replace(",","",$request->harga),
                                'luas'=>$request->luas,
                                'cashpickup'=>$request->cashpickup,
                                'nasabah'=>$request->nasabah,
                                'rate'=>$request->rate,
                                'dokumen_keuangan'=>$dokumen_keuangan,
                            ]);
            PasarNasabahh::where('id',$id)
                        ->update([
                            'alamat_domisili'=>$request->alamat_domisili,
                            'npwp'=>$request->npwp,
                        ]);

            PasarKeteranganUsaha::where('id',$id)
            ->update([
                'suku_bangsa_id'=>$request->suku_bangsa_id,
                'kepala_pasar_id'=>$request->kepala_pasar_id,


            ]);

            $role=role::select()->where('user_id', Auth::user()->id)->get()->first();

            PasarPembiayaanHistory::create([
                'pasar_pembiayaan_id'=> $id,
                'status_id'=> 2,
                'jabatan_id'=>$role->jabatan_id,
                'divisi_id'=>$role->divisi_id,
                'user_id'=> Auth::user()->id,
            ]);

            if ($request->slik[0]['nama_bank']){

                // return $request->slik[0]['nama_bank'];
                foreach ($request->slik as $key => $value) {


                // return $value;
                PasarSlik::create([
                    'pasar_pembiayaan_id'=>$id,
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


            return redirect('/pasar/komite/'.$id)->with('success', 'Proposal Pengajuan Sedang Dalam Proses Komite');

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
