<?php

namespace Modules\Skpd\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdSlik;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\SkpdAkad;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Admin\Entities\SkpdGolongan;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Admin\Entities\SkpdTanggungan;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Entities\SkpdJenisJaminan;
use Modules\Admin\Entities\SkpdSektorEkonomi;
use Modules\Admin\Entities\SkpdJenisPenggunaan;
use Modules\Admin\Entities\SkpdStatusPerkawinan;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;

class SkpdProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('skpd::proposal.index',[
            'title'=>'Proposal Calon Debitur',
            'proposals'=>SkpdPembiayaan::select()->where('user_id',Auth::user()->id)->where('skpd_sektor_ekonomi_id',null)->orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('skpd::create');
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
        $datafoto=SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->get();
        $foto=$datafoto;
        return view('skpd::proposal.lihat',[
            'title'=>'Detail Calon Nasabah',
            'pembiayaan'=>SkpdPembiayaan::select()->where('id',$id)->get()->first(),
            'nasabah'=>SkpdNasabah::select()->where('id',$id)->get()->first(),
            'fotodiri'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori', 'foto diri')->get()->first(),
            'fotoktp'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori', 'foto ktp')->get()->first(),
            'fotodiribersamaktp'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori', 'foto diri bersama ktp')->get()->first(),
            'fotokk'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori', 'Foto Kartu Keluarga')->get()->first(),
            'fotostatus'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori', 'Akta Status Perkawinan')->get()->first(),
            'aos'=>Role::select()->where('jabatan_id',1)->get(),
            'akads'=>SkpdAkad::all(), //udah
            'golongans'=>SkpdGolongan::all(), //udah
            'instansis'=>SkpdInstansi::all(), //udah
            'jaminans'=>SkpdJenisJaminan::all(), //udah
            'penggunaans'=>SkpdJenisPenggunaan::all(), //udah
            'sektors'=>SkpdSektorEkonomi::all(), //udah
            'statusperkawinans'=>SkpdStatusPerkawinan::all(), //udah
            'tanggungans'=>SkpdTanggungan::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('skpd::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        // return $request;

        SkpdPembiayaan::where('id',$id)
                        ->update([
                            'rate'=>$request->rate,
                            'skpd_sektor_ekonomi_id'=>$request->skpd_sektor_ekonomi_id,
                            'skpd_akad_id'=>$request->skpd_akad_id,
                        ]);
        SkpdNasabah::where('id',$id)
                    ->update([
                        'alamat_domisili'=>$request->alamat_domisili,
                        'no_npwp'=>$request->no_npwp,
                    ]);


        $role=role::select()->where('user_id', Auth::user()->id)->get()->first();
        // $dokumen_keuangan= $request->foto->store('ideb-skpd-pembiayaan');
        //  $dokumen_konfirmasi= $request->foto->store('konfirmasi-skpd-pembiayaan');
        SkpdPembiayaanHistory::create([
            'skpd_pembiayaan_id'=> $id,
            'status_id'=> 2,
            'jabatan_id'=>$role->jabatan_id,
            'divisi_id'=>$role->divisi_id,
            'user_id'=> Auth::user()->id,
        ]);

        $request -> validate([
            'foto.*.kategori'=> 'required',
            'foto.*.foto'=> 'required',
        ]);

        foreach ($request->foto as $key => $value) {
            if ($value['foto']){
                $foto= $value['foto']->store('foto-skpd-pembiayaan');
            }
            SkpdFoto::create([
                'skpd_pembiayaan_id'=>$id,
                'kategori'=> $value['kategori'],
                'foto'=> $foto,
            ]);
        }

            if ($request->slik[0]['nama_bank']){

                // return $request->slik[0]['nama_bank'];
                foreach ($request->slik as $key => $value) {

                    // $plafond=$value['plafond'];
                    // $margin=$value['margin']/100;
                    // $tenor=$value['tenor'];
                    // $angsuran=$plafond*$margin*$tenor/$plafond;

                    // return $value;
                    SkpdSlik::create([
                        'skpd_pembiayaan_id'=>$id,
                        'nama_bank'=> $value['nama_bank'],
                        'plafond'=> $value['plafond'],
                        'outstanding'=> $value['outstanding'],
                        'tenor'=> $value['tenor'],
                        'margin'=> $value['margin'],
                        'angsuran'=> $value['angsuran'],
                        'agunan'=> $value['agunan'],
                        'kol_tertinggi'=> $value['kol_tertinggi'],
                    ]);
            }
        }

        return redirect('/skpd/komite/'.$id)->with('success', 'Proposal Pengajuan Sedang Dalam Proses Komite');

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
