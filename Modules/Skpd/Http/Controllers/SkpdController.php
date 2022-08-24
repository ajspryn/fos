<?php

namespace Modules\Skpd\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdJaminanLainnya;
use Modules\Skpd\Entities\SkpdOrangTerdekat;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;

class SkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('skpd::index',[
            'title'=>'Dashboard SKPD',
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
        $hitung=SkpdPembiayaan::select()->get()->count();
        $id=$hitung+1;

        // return $request;
        $sk_pengangkatan=$request->file('sk_pengangkatan')->store('skpd-sk_pengangkatan');
        $dokumen_jaminan=$request->file('dokumen_jaminan')->store('skpd-dokumen_jaminan');
        $dokumen_keuangan=$request->file('dokumen_keuangan')->store('skpd-dokumen_keuangan');
        $dokumen_slip_gaji=$request->file('dokumen_slip_gaji')->store('skpd-dokumen_slip_gaji');

        SkpdPembiayaan::create([
            'id'=>$id,
            'user_id'=> $request->user_id,
            'tanggal_pengajuan'=> $request->tanggal_pengajuan,
            'nominal_pembiayaan'=> str_replace(",","",$request->nominal_pembiayaan),
            'tenor'=> $request->tenor,
            'rate'=> $request->rate,
            'skpd_jenis_penggunaan_id'=> $request->skpd_jenis_penggunaan_id,
            'skpd_sektor_ekonomi_id'=> $request->skpd_sektor_ekonomi_id,
            'skpd_akad_id'=> $request->skpd_akad_id,
            'skpd_nasabah_id'=> $id,
            'skpd_instansi_id'=> $request->skpd_instansi_id,
            'skpd_golongan_id'=> $request->skpd_golongan_id,
            'sk_pengangkatan'=> $sk_pengangkatan,
            'dokumen_keuangan'=> $dokumen_keuangan,
            'dokumen_slip_gaji'=> $dokumen_slip_gaji,
            'gaji_pokok'=> str_replace(",","",$request->gaji_pokok),
            'pendapatan_lainnya'=> str_replace(",","",$request->pendapatan_lainnya),
            'gaji_tpp'=> str_replace(",","",$request->gaji_tpp),
            'pengeluaran_lainnya'=> str_replace(",","",$request->pengeluaran_lainnya),
            'keterangan_pengeluaran_lainnya'=> $request->keterangan_pengeluaran_lainnya,
        ]);

        SkpdNasabah::create([
            'id'=>$id,
            'nama_nasabah'=> $request->nama_nasabah,
            'no_ktp'=> $request->no_ktp,
            'tempat_lahir'=> $request->tempat_lahir,
            'tgl_lahir'=> $request->tgl_lahir,
            'alamat'=> $request->alamat,
            'rt'=> $request->rt,
            'rw'=> $request->rw,
            'desa_kelurahan'=> $request->desa_kelurahan,
            'kecamatan'=> $request->kecamatan,
            'kabkota'=> $request->kabkota,
            'provinsi'=> $request->provinsi,
            'alamat_domisili'=> $request->alamat_domisili,
            'skpd_status_perkawinan_id'=> $request->skpd_status_perkawinan_id,
            'skpd_tanggungan_id'=> $request->skpd_tanggungan_id,
            'no_npwp'=> $request->no_npwp,
            'no_telp'=> str_replace("+62 0","",$request->no_telp),
        ]);

        SkpdOrangTerdekat::create([
            'skpd_nasabah_id'=> $id,
            'nama_orang_terdekat'=> $request->nama_orang_terdekat,
            'alamat_orang_terdekat'=> $request->alamat_orang_terdekat,
            'rt_orang_terdekat'=> $request->rt_orang_terdekat,
            'rw_orang_terdekat'=> $request->rw_orang_terdekat,
            'desa_kelurahan_orang_terdekat'=> $request->desa_kelurahan_orang_terdekat,
            'kecamatan_orang_terdekat'=> $request->kecamatan_orang_terdekat,
            'kabkota_orang_terdekat'=> $request->kabkota_orang_terdekat,
            'provinsi_orang_terdekat'=> $request->provinsi_orang_terdekat,
            'no_telp_orang_terdekat'=> str_replace("+62 0","",$request->no_telp_orang_terdekat),
        ]);

        SkpdJaminan::create([
            'skpd_pembiayaan_id'=> $id,
            'skpd_jenis_jaminan_id'=> $request->skpd_jenis_jaminan_id,
            'dokumen_jaminan'=> $dokumen_jaminan,
        ]);

         SkpdPembiayaanHistory::create([
            'skpd_pembiayaan_id'=> $id,
            'status_id'=> 1,
            'jabatan_id'=>0,
            'divisi_id'=>null,
            'user_id'=> null,
        ]);

        if($request->file('dokumen_jaminan_lainnya')){
            $dokumen_jaminan_lainnya=$request->file('dokumen_jaminan_lainnya')->store('skpd-dokumen_jaminan_lainnya');
            SkpdJaminanLainnya::create([
                'skpd_pembiayaan_id'=> $id,
                'nama_jaminan_lainnya'=> $request->skpd_jenis_jaminan_id,
                'dokumen_jaminan_lainnya'=> $dokumen_jaminan_lainnya,
            ]);
        }

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

        return redirect('/')->with('success', 'Pengajuan Anda Sedang Di Proses Silahkan Hubungi AO');
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
