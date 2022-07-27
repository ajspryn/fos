<?php

namespace Modules\Form\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class FormulirPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('form::umkm.index');
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

        $hitung=PasarPembiayaan::select()->get()->count();
        $id=$hitung+1;

         PasarPembiayaan::create([
            'id'=>$id,
            'tgl_pembiayaan'=> $request ->tgl_pembiayaan,
            'nasabah_id'=> $id,
            'AO_id'=>$request->AO_id,
            'penggunaan_id'=> $request ->penggunaan_id,
            'sektor_id'=> $request ->sektor_id,
            'akad_id'=> $request ->akad_id,
            'pesanan_blok'=> $request ->pesanan_blok,
            'tenor'=> $request ->tenor,
            'nominal_pembiayaan'=> $request ->nominal_pembiayaan,
            'luas'=> $request ->luas,
            'harga'=> $request ->harga,
            'jenis_tempat_usaha'=> $request ->jenis_tempat_usaha,
            'administrasi'=> $request ->administrasi,
            'jumlah'=> $request ->jumlah,
            'jaminan_id'=> $id,
            'pasar_legalitas_rumah_id'=> $id,
            'pasar_usaha_id'=> $id,
            'jaminanlain_id'=> $request ->jaminanlain_id,
            'omset'=>str_replace(",","",$request->omset),
            'hpp'=>str_replace(",","",$request->hpp),
            'listrik'=>str_replace(",","",$request->listrik),
            'trasport'=>str_replace(",","",$request->trasport),
            'karyawan'=>str_replace(",","",$request->karyawan),
            'telpon'=>str_replace(",","",$request->telpon),
            'sewa'=>str_replace(",","",$request->sewa),
            'cicilan_btb'=>str_replace(",","",$request->cicilan_btb),
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
            'pendidikan'=> $request ->pendidikan,
            'jumlah_anak'=> $request ->jumlah_anak,
            'npwp'=> $request ->npwp,
            'no_tlp'=> $request ->no_tlp,
            'namaot'=> $request ->namaot,
            'alamat_ot'=> $request ->alamat_ot,
            'telp_ot'=> $request ->telp_ot,
            'foto_id'=> $id,
        ]);

        // PasarJaminan::create([
        //     'id'=>$id,
        //     'pasar_pembiayaan_id'=> $id,
        //     'no_ktb'=> $request ->no_ktb,
        //     'dokumen_jaminan_kbr'=> $request ->dokumen_jaminan_kbr,
        // ]);

        PasarLegalitasRumah::create([
            'id'=>$id,
            'pasar_pembiayaan_id'=> $id,
            'kepemilikan_rumah'=> $request ->kepemilikan_rumah,
            'legalitas_kepemilikan_rumah'=> $request ->legalitas_kepemilikan_rumah,
            'dokumen_legalitas_kepemilikan_rumah'=> $request ->dokumen_legalitas_kepemilikan_rumah,
        ]);

        PasarKeteranganUsaha::create([
            'id'=>$id,
            'pasar_pembiayaan_id'=> $id,
            'jenis_pasar_id'=>$request->jenis_pasar_id,
            'suku_bangsa_id'=>$request->jenis_pasar_id,
            'kepala_pasar_id'=>$request->jenis_pasar_id,
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
        return redirect()->back()->with('success', 'Data Pasar Berhasil Ditambahkan');
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
