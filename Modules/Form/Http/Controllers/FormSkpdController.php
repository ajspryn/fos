<?php

namespace Modules\Form\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\SkpdAkad;
use Modules\Admin\Entities\SkpdGolongan;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Admin\Entities\SkpdJenisJaminan;
use Modules\Admin\Entities\SkpdJenisPenggunaan;
use Modules\Admin\Entities\SkpdSektorEkonomi;
use Modules\Admin\Entities\SkpdStatusPerkawinan;
use Modules\Admin\Entities\SkpdTanggungan;
use Modules\Admin\Http\Controllers\SkpdAkadController;
use Modules\Admin\Http\Controllers\SkpdGolonganController;
use Modules\Form\Entities\FormSkpd;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Skpd\Entities\SkpdPembiayaan;

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
        $hitung=SkpdPembiayaan::select()->get()->count();
        $id=$hitung+1;

        $rules_pembiayaan= [
            'id'=>$id,
            'tanggal_pengajuan'=> 'required',
            'harga_beli'=> 'required',
            'tenor'=> 'required',
            'skpd_jenis_penggunaan_id'=> 'nullable',
            'skpd_sektor_ekonomi_id'=> 'nullable',
            'skpd_akad_id'=> 'nullable',
            'skpd_nasabah_id'=> $id,
            'skpd_instansi_id'=> 'required',
            'skpd_golongan_id'=> 'required',
            'sk_pengangkatan'=> 'required',
            'gaji_pokok'=> 'required',
            'pendapatan_lainnya'=> 'required',
            'gaji_tpp'=> 'required',
            'pengeluaran_lainnya'=> 'nullable',
        ];

        $rules_nasabah= [
            'id'=>$id,
            'nama_nasabah'=> 'required',
            'no_ktp'=> 'required',
            'tempat_lahir'=> 'required',
            'tgl_lahir'=> 'required',
            'alamat'=> 'required',
            'skpd_status_perkawinan'=> 'required',
            'skpd_tanggungan_id'=> 'required',
            'no_npwp'=> 'nullable',
            'no_telp'=> 'required',
        ];

        $rules_jaminan= [
            'skpd_pembiayaan_id'=> $id,
            'skpd_jenis_jaminan_id'=> 'required',
            'dokumen_jaminan'=> 'required',
        ];

        $rules_jaminan= [
            'skpd_pembiayaan_id'=> $id,
            'skpd_jenis_jaminan_id'=> 'required',
            'dokumen_jaminan'=> 'required',
        ];

        $input_jaminan = $request->validate($rules_jaminan);
        $input_pembiayaan = $request->validate($rules_pembiayaan);
        $input_nasabah = $request->validate($rules_nasabah);

        SkpdJaminan::create($input_jaminan);
        SkpdNasabah::create($input_nasabah);
        SkpdPembiayaan::create($input_pembiayaan);
        return redirect()->back()->with('success', 'Data SKPD Berhasil Ditambahkan');
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
