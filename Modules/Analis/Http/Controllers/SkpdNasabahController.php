<?php

namespace Modules\Analis\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\SkpdJenisJaminan;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Skpd\Entities\SkpdPembiayaan;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class SkpdNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $proposals = SkpdNasabah::when($search, fn($q) => $q->where('nama_nasabah', 'like', "%$search%")->orWhere('no_ktp', 'like', "%$search%"))
            ->paginate(10)
            ->withQueryString();
        return view('analis::skpd.nasabah.index', [
            'title' => 'Data Nasabah',
            'proposals' => $proposals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('analis::create');
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
        $data = SkpdPembiayaan::select()->where('skpd_nasabah_id', $id)->first();

        $nasabah = SkpdNasabah::select()->where('id', $id)->first();

        $tenor = $data->tenor;
        $harga = $data->nominal_pembiayaan;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;

        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;

        $angsuran1 = (int)($harga_jual / $tenor);
        $jaminanlain = SkpdJaminan::select()->where('skpd_pembiayaan_id', $data->id)->first();
        return view('analis::skpd.nasabah.lihat', [
            'title' => 'Nasabah',
            'pembiayaan' => SkpdPembiayaan::select()->where('skpd_nasabah_id', $id)->first(),
            'nasabah' => $nasabah,
            'datas' => SkpdPembiayaan::select()->where('skpd_nasabah_id', $id)->get(),
            'historys' => SkpdPembiayaan::select()->where('skpd_nasabah_id', $id)->get(),
            'fotodiri' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->first(),
            'angsuran' => $angsuran1,
            'jaminans' => SkpdJenisJaminan::select()->where('kode_jaminan', $jaminanlain->jaminanlain)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('analis::edit');
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
