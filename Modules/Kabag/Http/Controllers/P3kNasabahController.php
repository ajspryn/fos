<?php

namespace Modules\Kabag\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\P3k\Entities\P3kFoto;
use Modules\P3k\Entities\P3kNasabah;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class P3kNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('kabag::p3k.nasabah.index', [
            'title' => 'Data Nasabah P3K',
            'proposals' => P3kNasabah::select()->orderBy('nama_nasabah', 'ASC')->get(),
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

        $data = P3kPembiayaan::select()->where('p3k_nasabah_id', $id)->first();

        $angsuran = 0;
        if ($data) {
            //Angsuran
            $nominalPembiayaan = $data->nominal_pembiayaan;
            $tenor = $data->tenor;
            $rate = $data->rate / 100;

            $hargaJual = ($nominalPembiayaan * $rate * $tenor) + $nominalPembiayaan;
            $angsuran = $tenor ? ($hargaJual / $tenor) : 0;

            //Pendapatan
            $gajiPokok = $data->gaji_pokok;
            $gajiTpp = $data->gaji_tpp;
            $totalPendapatan = $gajiPokok + $gajiTpp;

            //Pengeluaran
            $pengeluaranLainnya = $data->pengeluaran_lainnya;

            //Pendapatan bersih
            $pendapatanBersih = $totalPendapatan - $pengeluaranLainnya;

            //DSR
            $dsr = $totalPendapatan ? number_format(($angsuran / $totalPendapatan) * 100) : 0;

            //Timeline
            $waktuAwal = P3kPembiayaanHistory::select()->where('p3k_pembiayaan_id', $data->id)->orderby('created_at', 'asc')->first();
            $waktuAkhir = P3kPembiayaanHistory::select()->where('p3k_pembiayaan_id', $data->id)->orderby('created_at', 'desc')->first();

            if ($waktuAwal && $waktuAkhir) {
                $waktuMulai = Carbon::parse($waktuAwal->created_at);
                $waktuBerakhir = Carbon::parse($waktuAkhir->created_at);
                $totalWaktu = $waktuMulai->diffAsCarbonInterval($waktuBerakhir);
            }
        }

        return view('kabag::p3k.nasabah.lihat', [
            'title' => 'Data Nasabah',
            'nasabah' => P3kNasabah::select()->where('id', $id)->first(),
            'pembiayaan' => $data,
            'fotoKtp' => $data
                ? P3kFoto::select()->where('p3k_pembiayaan_id', $data->id)->where('kategori', 'Foto KTP')->first()
                : null,
            'angsuran' => $angsuran,
            'datas' => P3kPembiayaan::select()->where('p3k_nasabah_id', $id)->get(),
            'histories' => P3kPembiayaan::select()->where('p3k_nasabah_id', $id)->get(),

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
