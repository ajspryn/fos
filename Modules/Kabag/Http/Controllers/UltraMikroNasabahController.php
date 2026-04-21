<?php

namespace Modules\Kabag\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\UltraMikro\Entities\UltraMikroFoto;
use Modules\UltraMikro\Entities\UltraMikroNasabah;
use Modules\UltraMikro\Entities\UltraMikroPembiayaan;
use Modules\UltraMikro\Entities\UltraMikroPembiayaanHistory;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class UltraMikroNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('kabag::ultra_mikro.nasabah.index', [
            'title' => 'Data Nasabah Ultra Mikro',
            'proposals' => UltraMikroNasabah::select()->orderBy('nama_nasabah', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('kabag::create');
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

        $data = UltraMikroPembiayaan::select()->where('id', $id)->first();

        //Angsuran
        $nominalPembiayaan = $data->nominal_pembiayaan;
        $tenor = $data->tenor;

        $angsuran = $nominalPembiayaan / $tenor;

        //Pendapatan
        $penghasilan = $data->penghasilan;

        //Pengeluaran
        $pengeluaran = $data->pengeluaran;

        //Pendapatan bersih
        $pendapatanBersih = $penghasilan - $pengeluaran;

        //DSR
        $dsr = number_format(($angsuran / $pendapatanBersih) * 100);


        //Timeline
        $waktuAwal = UltraMikroPembiayaanHistory::select()->where('ultra_mikro_pembiayaan_id', $id)->orderby('created_at', 'asc')->first();
        $waktuAkhir = UltraMikroPembiayaanHistory::select()->where('ultra_mikro_pembiayaan_id', $id)->orderby('created_at', 'desc')->first();

        $waktuMulai = Carbon::parse($waktuAwal->created_at);
        $waktuBerakhir = Carbon::parse($waktuAkhir->created_at);

        $totalWaktu = $waktuMulai->diffAsCarbonInterval($waktuBerakhir);

        return view('kabag::ultra_mikro.nasabah.lihat', [
            'title' => 'Data Nasabah',
            'nasabah' => UltraMikroNasabah::select()->where('id', $id)->first(),
            'pembiayaan' => UltraMikroPembiayaan::select()->where('ultra_mikro_nasabah_id', $id)->first(),
            'fotoKtp' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
            'angsuran' => $angsuran,
            'datas' => UltraMikroPembiayaan::select()->where('ultra_mikro_nasabah_id', $id)->get(),
            'histories' => UltraMikroPembiayaan::select()->where('ultra_mikro_nasabah_id', $id)->get(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('kabag::edit');
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
