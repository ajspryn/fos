<?php

namespace Modules\Analis\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Pasar\Entities\PasarFoto;
use Modules\Pasar\Entities\PasarJaminan;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarSlik;

class PasarNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $proposals = PasarNasabahh::when($search, fn($q) => $q->where('nama_nasabah', 'like', "%$search%")->orWhere('no_ktp', 'like', "%$search%"))
            ->paginate(10)
            ->withQueryString();
        return view('analis::pasar.nasabah.index', [
            'title' => 'Nasabah',
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
        $data = PasarPembiayaan::select()->where('nasabah_id', $id)->first();
        $nasabah = PasarNasabahh::select()->where('id', $id)->first();
        $datas = PasarPembiayaan::select()->where('nasabah_id', $id)->get();

        $jaminanByPembiayaan = PasarJaminan::select()
            ->whereIn('pasar_pembiayaan_id', $datas->pluck('id'))
            ->get()
            ->keyBy('pasar_pembiayaan_id');

        $jenisJaminanByKode = PasarJenisJaminan::select()
            ->whereIn('kode_jaminan', $jaminanByPembiayaan->pluck('jaminanlain')->filter())
            ->get()
            ->keyBy('kode_jaminan');

        $jaminanNamaByPembiayaan = $jaminanByPembiayaan->mapWithKeys(function ($jaminan) use ($jenisJaminanByKode) {
            $namaJaminan = optional($jenisJaminanByKode->get($jaminan->jaminanlain))->nama_jaminan;
            return [$jaminan->pasar_pembiayaan_id => $namaJaminan];
        });

        $tenor = $data->tenor;
        $harga = $data->harga;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;

        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;

        $angsuran1 = (int)($harga_jual / $tenor);

        return view('analis::pasar.nasabah.lihat', [
            'title' => 'Nasabah',
            'pembiayaan' => $data,
            'nasabah' => $nasabah,
            'datas' => $datas,
            // 'history'=PasarNasabahh::select()->where('no_ktp'),
            'idebs' => PasarSlik::select()->where('pasar_pembiayaan_id', $id)->get(),
            'fotodiri' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->first(),
            'angsuran' => $angsuran1,
            'jaminanNamaByPembiayaan' => $jaminanNamaByPembiayaan,
            // 'jaminans'=>PasarJenisJaminan::select()->where('kode_jaminan',$jaminanlain->jaminanlain)->first(),
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
