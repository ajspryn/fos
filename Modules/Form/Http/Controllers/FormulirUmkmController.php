<?php

namespace Modules\Form\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\PasarAkad;
use Modules\Admin\Entities\PasarLamaBerdagang;
use Modules\Admin\Entities\PasarJaminanRumahh;
use Modules\Admin\Entities\PasarJenisDagang;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Admin\Entities\PasarJenisPasar;
use Modules\Admin\Entities\PasarPenggunaan;
use Modules\Admin\Entities\PasarSektorEkonomi;
use Modules\Admin\Entities\PasarStatusPerkawinan;
use Modules\Admin\Entities\PasarTanggungan;
use Modules\Umkm\Entities\UmkmFoto;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmJaminanLain;
use Modules\Umkm\Entities\UmkmKeteranganUsaha;
use Modules\Umkm\Entities\UmkmLegalitasRumah;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

class FormulirUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('form::umkm.index',[
            
            'akads'=>PasarAkad::all(),
            'penggunaans'=>PasarPenggunaan::all(),
            'sektors'=>PasarSektorEkonomi::all(),
            'pasars'=>PasarJenisPasar::all(),
            'lamas'=>PasarLamaBerdagang::all(),
            'rumahs'=>PasarJaminanRumahh::all(),
            'dagangs'=>PasarJenisDagang::all(),
            'aos'=>Role::select()->where('jabatan_id',1)->get(),
            'tanggungans'=>PasarTanggungan::all(),
            'statuss'=>PasarStatusPerkawinan::all(),
            'jaminans'=>PasarJenisJaminan::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('form::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
        $hitung=UmkmPembiayaan::select()->get()->count();
        $id=$hitung+1;
        UmkmPembiayaan::create([
            'id'=>$id,
            'tgl_pembiayaan'=> $request ->tgl_pembiayaan,
            'nasabah_id'=> $id,
            'AO_id'=>$id,
            'penggunaan_id'=> $request ->penggunaan_id,
            'tenor'=> $request ->tenor,
            'nominal_pembiayaan'=>str_replace(",","", $request ->nominal_pembiayaan),
            'jaminan_id'=> $id,
            'jaminanlain_id'=> $id,
            'umkm_legalitas_rumah_id'=> $id,
            'umkm_usaha_id'=> $id,
            'omset'=>str_replace(",","",$request->omset),
            'hpp'=>str_replace(",","",$request->hpp),
            'listrik'=>str_replace(",","",$request->listrik),
            'trasport'=>str_replace(",","",$request->trasport),
            'karyawan'=>str_replace(",","",$request->karyawan),
            'telpon'=>str_replace(",","",$request->telpon),
            'sewa'=>str_replace(",","",$request->sewa),
            'slik_id'=>$id,
            'keb_keluarga'=>str_replace(",","",$request->keb_keluarga),
            'kesanggupan_angsuran'=>str_replace(",","",$request->kesanggupan_angsuran),
            'keterangan_keb_keluarga'=>$request->keterangan_keb_keluarga,
            'aset'=> $request ->aset,
        ]);

        UmkmNasabah::create([
            'id'=>$id,
            'nama_nasabah'=> $request ->nama_nasabah,
            'no_ktp'=> $request ->no_ktp,
            'tmp_lahir'=> $request ->tmp_lahir,
            'tgl_lahir'=> $request ->tgl_lahir,
            'alamat'=> $request ->alamat,
            'rt'=> $request ->rt,
            'rw'=> $request ->rw,
            'desa_kelurahan'=> $request ->desa_kelurahan,
            'kecamatan'=> $request ->kecamatan,
            'kabkota'=> $request ->kabkota,
            'provinsi'=> $request ->provinsi,
            'alamat_domisili'=> $request ->provinsi,
            'lama_tinggal'=> $request ->lama_tinggal,
            'nama_pasangan'=> $request ->nama_pasangan,
            'nama_ibu'=> $request ->nama_ibu,
            'agama_id'=> $request ->agama_id,
            'status_id'=> $id,
            'jenis_kelamin'=>$request ->jenis_kelamin,
            'pendidikan'=> $request ->pendidikan,
            'jumlah_anak'=> $request ->jumlah_anak,
            'npwp'=> $request ->npwp,
            'no_tlp'=>str_replace("+62 0","",$request->no_tlp),
            'namaot'=> $request ->namaot,
            'alamat_ot'=> $request ->alamat_ot,
            'telp_ot'=> str_replace("+62 0","",$request ->telp_ot),
            'foto_id'=> $id,
        ]);

        
        $dokumenktb=$request->file('dokumenktb')->store('Umkm-dokumen-ktb');
        $dokumen_jaminan=$request->file('dokumen_jaminan')->store('Umkm-dokumen_jaminanlain');

        UmkmJaminan::create([
            'id'=>$id,
            'umkm_pembiayaan_id'=> $id,
            'no_ktb'=> $request ->no_ktb,
            'dokumenktb'=> $dokumenktb,
        ]);


        UmkmJaminanLain::create([
            'id'=>$id,
            'umkm_pembiayaan_id'=> $id,
            'jaminanlain'=> $request ->jaminanlain,
            'dokumen_jaminan'=> $dokumen_jaminan,
        ]);

        UmkmLegalitasRumah::create([
            'id'=>$id,
            'umkm_pembiayaan_id'=> $id,
            'kepemilikan_rumah'=> $request ->kepemilikan_rumah,
            'legalitas_kepemilikan_rumah'=> $request ->legalitas_kepemilikan_rumah,
            'dokumen_legalitas_kepemilikan_rumah'=> $request ->dokumen_legalitas_kepemilikan_rumah,
        ]);

        UmkmPembiayaanHistory::create([
            'umkm_pembiayaan_id'=> $id,
            'status'=> 'Calon Debitur Menginput Permohonan',
            'user_id'=> null,
        ]);
        
        UmkmKeteranganUsaha::create([
            'id'=>$id,
            'umkm_pembiayaan_id'=> $id,
            'nama_usaha'=>$request->nama_usaha,
            'lama_usaha'=>$request->lama_usaha,
            'kep_toko_id'=>$request->kep_toko_id,
            'leg_toko_id'=>$request->leg_toko_id,
            'jenisdagang_id'=>$request->jenisdagang_id,
            'foto_id'=>$id,
        ]);

        $request->validate([
            'foto.*.kategori'=>'required',
            'foto.*.foto'=>'required',
        ]);
        
        foreach($request->foto as $key => $value){
            if($value['foto']){
                $foto=$value['foto']->store('foto-Umkm-pembiayaan');
            }
            UmkmFoto::create([
                'umkm_pembiayaan_id'=>$id,
                'kategori'=>$value['kategori'],
                'foto'=>$foto,
            ]);
        }

        
        
        return redirect()->back()->with('success', 'Data Umkm Berhasil Ditambahkan');
    }
    

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('form::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('form::edit');
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
