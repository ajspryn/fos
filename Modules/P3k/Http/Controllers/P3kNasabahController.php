<?php

namespace Modules\P3k\Http\Controllers;

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
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = P3kNasabah::query()
            ->when($search, function ($q) use ($search) {
                $q->where('nama_nasabah', 'like', "%{$search}%")
                    ->orWhere('no_ktp', 'like', "%{$search}%");
            })
            ->orderBy('nama_nasabah', 'ASC');

        return view('p3k::nasabah.index', [
            'title' => 'Data Nasabah P3K',
            'proposals' => $query->paginate(25)->appends($request->only('search')),
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('p3k::create');
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
        $pembiayaan = P3kPembiayaan::select()->where('p3k_nasabah_id', $id)->orderBy('created_at', 'desc')->first();
        $datas = P3kPembiayaan::select()->where('p3k_nasabah_id', $id)->get();

        $angsuran = 0;
        $dsr = 0;

        if ($pembiayaan) {
            //Angsuran
            $nominalPembiayaan = $pembiayaan->nominal_pembiayaan;
            $tenor = $pembiayaan->tenor;
            $rate = $pembiayaan->rate / 100;

            $hargaJual = ($nominalPembiayaan * $rate * $tenor) + $nominalPembiayaan;
            $angsuran = $tenor ? ($hargaJual / $tenor) : 0;

            //Pendapatan
            $gajiPokok = $pembiayaan->gaji_pokok;
            $gajiTpp = $pembiayaan->gaji_tpp;
            $totalPendapatan = $gajiPokok + $gajiTpp;

            //Pengeluaran
            $pengeluaranLainnya = $pembiayaan->pengeluaran_lainnya;

            //Pendapatan bersih
            $pendapatanBersih = $totalPendapatan - $pengeluaranLainnya;

            //DSR
            $dsr = $totalPendapatan ? number_format(($angsuran / $totalPendapatan) * 100) : 0;

            //Timeline
            $waktuAwal = P3kPembiayaanHistory::select()->where('p3k_pembiayaan_id', $pembiayaan->id)->orderby('created_at', 'asc')->first();
            $waktuAkhir = P3kPembiayaanHistory::select()->where('p3k_pembiayaan_id', $pembiayaan->id)->orderby('created_at', 'desc')->first();

            if ($waktuAwal && $waktuAkhir) {
                $waktuMulai = Carbon::parse($waktuAwal->created_at);
                $waktuBerakhir = Carbon::parse($waktuAkhir->created_at);
                $totalWaktu = $waktuMulai->diffAsCarbonInterval($waktuBerakhir);
            }
        }

        return view('p3k::nasabah.lihat', [
            'title' => 'Data Nasabah',
            'nasabah' => P3kNasabah::select()->where('id', $id)->first(),
            'pembiayaan' => $pembiayaan,
            'fotoKtp' => $pembiayaan
                ? P3kFoto::select()->where('p3k_pembiayaan_id', $pembiayaan->id)->where('kategori', 'Foto KTP')->first()
                : null,
            'angsuran' => $angsuran,
            'datas' => $datas,
            'histories' => $datas,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('p3k::edit');
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
