<?php

namespace Modules\Skpd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Illuminate\Contracts\Support\Renderable;
use Modules\Skpd\Entities\SkpdFoto;

class SkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('skpd::index');
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
        // dd($request);
        return $request;
        $hitung=SkpdPembiayaan::select()->get()->count();
        $id=$hitung+1;

        // $rules_pembiayaan= [
        //     'id'=>$id,
        //     'tanggal_pengajuan'=> 'required',
        //     'harga_beli'=> 'required',
        //     'tenor'=> 'required',
        //     'skpd_jenis_penggunaan_id'=> 'nullable',
        //     'skpd_sektor_ekonomi_id'=> 'nullable',
        //     'skpd_akad_id'=> 'nullable',
        //     'skpd_nasabah_id'=> $id,
        //     'skpd_instansi_id'=> 'required',
        //     'skpd_golongan_id'=> 'required',
        //     'sk_pengangkatan'=> 'required',
        //     'gaji_pokok'=> 'required',
        //     'pendapatan_lainnya'=> 'required',
        //     'gaji_tpp'=> 'required',
        //     'pengeluaran_lainnya'=> 'nullable',
        // ];

        // $rules_nasabah= [
        //     'id'=>$id,
        //     'nama_nasabah'=> 'required',
        //     'no_ktp'=> 'required',
        //     'tempat_lahir'=> 'required',
        //     'tgl_lahir'=> 'required',
        //     'alamat'=> 'required',
        //     'skpd_status_perkawinan'=> 'required',
        //     'skpd_tanggungan_id'=> 'required',
        //     'no_npwp'=> 'nullable',
        //     'no_telp'=> 'required',
        // ];

        // $rules_jaminan= [
        //     'skpd_pembiayaan_id'=> $id,
        //     'skpd_jenis_jaminan_id'=> 'required',
        //     'dokumen_jaminan'=> 'required',
        // ];

        // $request -> validate([
        //     'foto.*.skpd_pembiayaan_id'=>$id,
        //     'foto.*.foto'=> 'required',
        //     'foto.*.kategori'=> 'required',
        // ]);

        // foreach ($request->foto as $key => $value) {
        //     $input=SkpdFoto::create($value);
        // }

        // $input_jaminan = $request->validate($rules_jaminan);
        // $input_pembiayaan = $request->validate($rules_pembiayaan);
        // $input_nasabah = $request->validate($rules_nasabah);

        SkpdJaminan::create([
           'skpd_pembiayaan_id'=> $id,
            'skpd_jenis_jaminan_id'=> $request->skpd_jenis_jaminan_id,
            'dokumen_jaminan'=> $request->dokumen_jaminan,
        ]);

        SkpdNasabah::create([
              'id'=>$id,
            'nama_nasabah'=> $request->nama_nasabah,
            'no_ktp'=> $request->no_ktp,
            'tempat_lahir'=> $request->tempat_lahir,
            'tgl_lahir'=> $request->tgl_lahir,
            'alamat'=> $request->alamat,
            'skpd_status_perkawinan_id'=> $request->skpd_status_perkawinan_id,
            'skpd_tanggungan_id'=> $request->skpd_tanggungan_id,
            'no_npwp'=> $request->no_npwp,
            'no_telp'=> $request->no_telp,
        ]);
        SkpdPembiayaan::create([
              'id'=>$id,
            'tanggal_pengajuan'=> $request->tanggal_pengajuan,
            'harga_beli'=> $request-> harga_beli,
            'tenor'=> $request-> tenor,
            'skpd_jenis_penggunaan_id'=> $request->skpd_jenis_penggunaan_id,
            'skpd_sektor_ekonomi_id'=> $request->skpd_sektor_ekonomi_id,
            'skpd_akad_id'=> $request->skpd_akad_id,
            'skpd_nasabah_id'=> $id,
            'skpd_instansi_id'=> $request->skpd_instansi_id,
            'skpd_golongan_id'=> $request->skpd_golongan_id,
            'sk_pengangkatan'=> $request->sk_pengangkatan,
            'gaji_pokok'=> $request->gaji_pokok,
            'pendapatan_lainnya'=> $request->pendapatan_lainnya,
            'gaji_tpp'=> $request->gaji_tpp,
            'pengeluaran_lainnya'=> $request->pengeluaran_lainnya,
        ]);
        return redirect()->back()->with('success', 'Data SKPD Berhasil Ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('skpd::show');
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
