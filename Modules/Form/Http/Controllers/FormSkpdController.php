<?php

namespace Modules\Form\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Form\Entities\FormSkpd;
use Modules\Admin\Entities\SkpdAkad;
use Modules\Skpd\Entities\SkpdJaminan;
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
use Modules\Admin\Http\Controllers\SkpdAkadController;
use Modules\Admin\Http\Controllers\SkpdGolonganController;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdJaminanLainnya;
use Modules\Skpd\Entities\SkpdOrangTerdekat;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;

class FormSkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('form::skpd.index',[
            'title' => 'Form SKPD',
            'aos'=>Role::select()->where('jabatan_id',1)->get(),
            //'formskpds'=>FormSkpd::all(),
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
        // $hitung=SkpdPembiayaan::select()->get()->count();
        // $id=$hitung+1;

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

        // $rules_jaminan= [
        //     'skpd_pembiayaan_id'=> $id,
        //     'skpd_jenis_jaminan_id'=> 'required',
        //     'dokumen_jaminan'=> 'required',
        // ];

        // $input_jaminan = $request->validate($rules_jaminan);
        // $input_pembiayaan = $request->validate($rules_pembiayaan);
        // $input_nasabah = $request->validate($rules_nasabah);

        // SkpdJaminan::create($input_jaminan);
        // SkpdNasabah::create($input_nasabah);
        // SkpdPembiayaan::create($input_pembiayaan);
        // return redirect()->back()->with('success', 'Data SKPD Berhasil Ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('form::skpd.nasabah',[
            'title' => 'Form SKPD',
            'aos'=>Role::select()->where('jabatan_id',1)->get(),
            'akads'=>SkpdAkad::all(), //udah
            'golongans'=>SkpdGolongan::all(), //udah
            'instansis'=>SkpdInstansi::all(), //udah
            'jaminans'=>SkpdJenisJaminan::all(), //udah
            'penggunaans'=>SkpdJenisPenggunaan::all(), //udah
            'sektors'=>SkpdSektorEkonomi::all(), //udah
            'statusperkawinans'=>SkpdStatusPerkawinan::all(), //udah
            'tanggungans'=>SkpdTanggungan::all(),
            'pembiayaan'=>SkpdPembiayaan::select()->where('id',$id)->get()->first(),
            'nasabah'=>SkpdNasabah::select()->where('id',$id)->get()->first(),
    

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
        $hitung=SkpdPembiayaan::select()->get()->count();
        $number=$hitung+1;

        // return $request;
        $sk_pengangkatan=$request->file('sk_pengangkatan')->store('skpd-sk_pengangkatan');
        $dokumen_jaminan=$request->file('dokumen_jaminan')->store('skpd-dokumen_jaminan');
        $dokumen_keuangan=$request->file('dokumen_keuangan')->store('skpd-dokumen_keuangan');
        $dokumen_slip_gaji=$request->file('dokumen_slip_gaji')->store('skpd-dokumen_slip_gaji');

        SkpdPembiayaan::create([
            'id'=>$number,
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

        SkpdNasabah::where('id', $id)->update([
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
            'skpd_nasabah_id'=> $number,
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
            'skpd_pembiayaan_id'=> $number,
            'skpd_jenis_jaminan_id'=> $request->skpd_jenis_jaminan_id,
            'dokumen_jaminan'=> $dokumen_jaminan,
        ]);

         SkpdPembiayaanHistory::create([
            'skpd_pembiayaan_id'=> $number,
            'status_id'=> 1,
            'jabatan_id'=>0,
            'divisi_id'=>null,
            'user_id'=> null,
        ]);

        if($request->file('dokumen_jaminan_lainnya')){
            $dokumen_jaminan_lainnya=$request->file('dokumen_jaminan_lainnya')->store('skpd-dokumen_jaminan_lainnya');
            SkpdJaminanLainnya::create([
                'skpd_pembiayaan_id'=> $number,
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
                'skpd_pembiayaan_id'=>$number,
                'kategori'=> $value['kategori'],
                'foto'=> $foto,
            ]);
        }

        return redirect('/')->with('success', 'Pengajuan Anda Sedang Di Proses Silahkan Hubungi AO');
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
