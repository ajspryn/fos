<?php

namespace Modules\Umkm\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Entities\PasarAkad;
use Modules\Admin\Entities\PasarCashPick;
use Modules\Admin\Entities\PasarJaminanRumahh;
use Modules\Admin\Entities\PasarJenisDagang;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Admin\Entities\PasarJenisNasabah;
use Modules\Admin\Entities\PasarJenisPasar;
use Modules\Admin\Entities\PasarLamaBerdagang;
use Modules\Admin\Entities\PasarPenggunaan;
use Modules\Admin\Entities\PasarSektorEkonomi;
use Modules\Admin\Entities\PasarStatusPerkawinan;
use Modules\Admin\Entities\PasarSukuBangsa;
use Modules\Admin\Entities\PasarTanggungan;
use Modules\Umkm\Entities\UmkmFoto;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmJaminanLain;
use Modules\Umkm\Entities\UmkmKeteranganUsaha;
use Modules\Umkm\Entities\UmkmLegalitasRumah;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;
use Modules\Umkm\Entities\UmkmSlik;
use Modules\Umkm\Entities\UmkmSlikPasangan;

class UmkmRevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $komite = UmkmPembiayaan::select()->where('AO_id',Auth::user()->id)->whereNotNull('sektor_id')->orderby('updated_at','desc')->get();
        return view('umkm::revisi.index', [
            'title' => 'Data  Revisi Proposal Nasabah',
            'komites' => $komite,
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
        $datafoto = UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->get();
        $foto = $datafoto;
        return view('umkm::Revisi.lihat', [
            'title' => 'Detail Calon Nasabah',
            'pembiayaan' => UmkmPembiayaan::select()->where('id', $id)->get()->first(),
            'nasabah' => UmkmNasabah::select()->where('id', $id)->get()->first(),
            'datanasabah' => UmkmNasabah::select()->where('id', $id)->get()->first(),
            'usahas' => UmkmKeteranganUsaha::all(), //udah
            'akads' => PasarAkad::all(),
            'sektors' => PasarSektorEkonomi::all(),
            'pasars' => PasarJenisPasar::all(),
            'lamas' => PasarLamaBerdagang::all(),
            'rumahs' => PasarJaminanRumahh::all(),
            'dagangs' => PasarJenisDagang::all(),
            'aos' => Role::select()->where('jabatan_id', 1)->get(),
            'cashs' => PasarCashPick::all(),
            'jaminans' => PasarJenisJaminan::all(),
            'nasabahs' => PasarJenisNasabah::all(),
            'sukus' => PasarSukuBangsa::all(),
            'penggunaans'=>PasarPenggunaan::all(),
            'dagangs'=>PasarJenisDagang::all(),
            'tanggungans'=>PasarTanggungan::all(),
            'statuss'=>PasarStatusPerkawinan::all(),
            'idebs'=>UmkmSlik::select()->where('umkm_pembiayaan_id',$id)->get(),
            'idebpasangans'=>UmkmSlikPasangan::select()->where('umkm_pembiayaan_id',$id)->get(),
            'jaminanutama' => UmkmJaminan::select()->where('umkm_pembiayaan_id',$id)->get()->first(), //udah
            'jaminanlain' => UmkmJaminanLain::select()->where('umkm_pembiayaan_id',$id)->get()->first(), //udah
            // 'fotodiri' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->get()->first(),
            // 'fotoktp' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->get()->first(),
            // 'fotodiriktp' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Diri Bersama KTP')->get()->first(),
            // 'fotokk' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->get()->first(),
            // 'fototoko' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto toko')->get()->first(),
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = UmkmPembiayaan::select()->where('id',$id)->get()->first();
        UmkmPembiayaan::where('id',$id)->update([
            'id'=>$id,
            'tgl_pembiayaan'=> $request ->tgl_pembiayaan,
            'AO_id'=>$request->AO_id,
            'penggunaan_id'=> $request ->penggunaan_id,
            'tenor'=> $request ->tenor,
            'rate'=> $request ->rate,
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
        ]);

        
        if ($request->file('dokumen_keuangan')) {
            if ($request->dokumen_keuangan_lama) {
                Storage::delete($request->dokumen_keuangan_lama);
            }
            $dokumen_keuangan=$request->file('dokumen_keuangan')->store('umkm-dokumen-keuangan');
            UmkmPembiayaan::where('id',$id)->update([
                    'dokumen_keuangan' => $dokumen_keuangan,
                ]);
        }
        else{
            
        }

        UmkmNasabah::where('id',$data->nasabah_id)->update([
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
            'status_id'=> $request -> status_id,
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

        
       
        UmkmJaminan::where('umkm_pembiayaan_id',$id)->update([
            'umkm_pembiayaan_id'=> $id,
            'no_ktb'=> $request ->no_ktb,  
            'jaminanlain'=> $request ->jaminanlain,
        ]);

        if ($request->file('dokumenktb')) {
            if ($request->dokumenlama) {
                Storage::delete($request->dokumenlama);
            }
            $dokumenktb = $request->file('dokumenktb')->store('umkm-dokumen-ktb');

            UmkmJaminan::where('umkm_pembiayaan_id',$id)->update([
                'dokumenktb'=> $dokumenktb,
            ]);
        }
        
        if ($request->file('dokumen_jaminan')) {
            if ($request->dokumenjaminanlama) {
                Storage::delete($request->dokumenjaminanlama);
            }

            $dokumen_jaminan=$request->file('dokumen_jaminan')->store('umkm-dokumen_jaminan');
            UmkmJaminanLain::where('umkm_pembiayaan_id',$id)->update([
                'umkm_pembiayaan_id'=> $id,
                'dokumen_jaminan'=>$dokumen_jaminan,
            ]);
        
        }
        else{

        }

        UmkmLegalitasRumah::where('umkm_pembiayaan_id',$id)->update([
           
            'umkm_pembiayaan_id'=> $id,
            'kepemilikan_rumah'=> $request ->kepemilikan_rumah,
            'legalitas_kepemilikan_rumah'=> $request ->legalitas_kepemilikan_rumah,
            'dokumen_legalitas_kepemilikan_rumah'=> $request ->dokumen_legalitas_kepemilikan_rumah,
        ]);

        UmkmPembiayaanHistory::create([
                'umkm_pembiayaan_id'=> $id,
                'status_id'=> 2,
                'user_id'=> null,
                'jabatan_id'=>1,
                'divisi_id'=>null
            ]);
       
        
        UmkmKeteranganUsaha::where('umkm_pembiayaan_id',$id)->update([
            
            'umkm_pembiayaan_id'=> $id,
            'nama_usaha'=>$request->nama_usaha,
            'lama_usaha'=>$request->lama_usaha,
            'kep_toko_id'=>$request->kep_toko_id,
            'leg_toko_id'=>$request->leg_toko_id,
            'jenisdagang_id'=>$request->jenisdagang_id,
        ]);

        // $request->validate([
        //     'foto.*.kategori' => 'required',
        //     'foto.*.foto' => 'required',
        // ]);
        if (request('perbarui_foto_pemohon') == 'Ya') {
        foreach ($request->foto as $key => $value) {
            if ($value['foto']) {
                Storage::delete($value['foto_lama']);
                $foto = $value['foto']->store('foto-umkm-pembiayaan');

                UmkmFoto::where('umkm_pembiayaan_id', $id)->where('id',$value['id'])->update([
                    'umkm_pembiayaan_id' => $id,
                    'kategori' => $value['kategori'],
                    'foto' => $foto,
                ]);
            }
        }}
        
        else{

        }

        if ($request->slik[0]['nama_bank']){

            UmkmSlik::select()->where('umkm_pembiayaan_id',$id)->delete();
        
            foreach ($request->slik as $key => $value) {

            UmkmSlik::create([
                'umkm_pembiayaan_id' => $id,
                'nama_bank' => $value['nama_bank'],
                'plafond' => $value['plafond'],
                'outstanding' => $value['outstanding'],
                'tenor' => $value['tenor'],
                'margin' => $value['margin'],
                'angsuran' => $value['angsuran'],
                'agunan' => $value['agunan'],
                'kol' => $value['kol'],
            ]);
        }
    }
        else{

        }

        
        if ($request->slikpasangan[0]['nama_bank']){

            UmkmSlikPasangan::select()->where('umkm_pembiayaan_id',$id)->delete();
            foreach ($request->slikpasangan as $key => $value) {


            // return $value;
            UmkmSlikPasangan::create([
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

    else{
            
    }

    
        
        return redirect('/umkm/komite/'.$id)->with('success', 'Proposal Pengajuan Sedang Dalam Proses Komite');
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
