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


class FormulirPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('form::pasar.index',[
            'title' => 'Form Pasar',
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
        return view('pasar::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return dd($request);
        $hitung=PasarPembiayaan::select()->get()->count();
        $id=$hitung+1;
        PasarPembiayaan::create([
            'id'=>$id,
            'tgl_pembiayaan'=> $request ->tgl_pembiayaan,
            'nasabah_id'=> $id,
            'AO_id'=>$request->AO_id,
            'penggunaan_id'=> $request ->penggunaan_id,
            'pesanan_blok'=> $request ->pesanan_blok,
            'tenor'=> $request ->tenor,
            'nominal_pembiayaan'=> $request ->nominal_pembiayaan,
            'luas'=> $request ->luas,
            'harga'=> $request ->harga,
            'jenis_tempat_usaha'=> $request ->jenis_tempat_usaha,
            'administrasi'=> $request ->administrasi,
            'jumlah'=> $request ->jumlah,
            'jaminan_id'=> $id,
            'jaminanlain_id'=> $id,
            'pasar_legalitas_rumah_id'=> $id,
            'pasar_keterangan_usaha_id'=> $id,
            'jaminanlain_id'=> $request ->jaminanlain_id,
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

        PasarNasabahh::create([
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
            'status_id'=> $request ->status_id,
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


        $dokumenktb=$request->file('dokumenktb')->store('pasar-dokumen-ktb');


        PasarJaminan::create([
            'id'=>$id,
            'pasar_pembiayaan_id'=> $id,
            'no_ktb'=> $request ->no_ktb,
            'dokumenktb'=> $dokumenktb,
        ]);


        PasarJaminanLain::create([
            'id'=>$id,
            'pasar_pembiayaan_id'=> $id,
            'jaminanlain'=> $request ->jaminanlain,
            'dokumen_jaminan'=>$request->file('dokumen_jaminan')->store('pasar-dokumen_jaminanlain'),
        ]);

        PasarLegalitasRumah::create([
            'id'=>$id,
            'pasar_pembiayaan_id'=> $id,
            'kepemilikan_rumah'=> $request ->kepemilikan_rumah,
            'legalitas_kepemilikan_rumah'=> $request ->legalitas_kepemilikan_rumah,
            'dokumen_legalitas_kepemilikan_rumah'=> $request ->dokumen_legalitas_kepemilikan_rumah,
        ]);

        PasarPembiayaanHistory::create([
            'pasar_pembiayaan_id'=> $id,
            'status_id'=> 1,
            'user_id'=> null,
            'jabatan_id'=>0,
            'divisi_id'=>null
        ]);

        PasarKeteranganUsaha::create([
            'id'=>$id,
            'pasar_pembiayaan_id'=> $id,
            'jenispasar_id'=>$request->jenispasar_id,
            'nama_usaha'=>$request->nama_usaha,
            'lama_usaha'=>$request->lama_usaha,
            'kep_toko_id'=>$request->kep_toko_id,
            'leg_toko_id'=>$request->leg_toko_id,
            'jenisdagang_id'=>$request->jenisdagang_id,
            'no_blok'=>$request->blok,
            'foto_id'=>$id,
        ]);

        $request->validate([
            'foto.*.kategori'=>'required',
            'foto.*.foto'=>'required',
        ]);

        foreach($request->foto as $key => $value){
            if($value['foto']){
                $foto=$value['foto']->store('foto-pasar-pembiayaan');
            }
            PasarFoto::create([
                'pasar_pembiayaan_id'=>$id,
                'kategori'=>$value['kategori'],
                'foto'=>$foto,
            ]);
        }



        return redirect('/')->with('success', 'Data Pasar Berhasil Ditambahkan');
    }



    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('pasar::show');
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
{{  }}
