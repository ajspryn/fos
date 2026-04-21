<?php

namespace Modules\Umkm\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $userId = Auth::id();
        $year = date('Y');

        $stats = Cache::remember("umkm:dashboard:{$userId}:{$year}", 300, function () use ($userId, $year) {
            $latestSub = DB::table('umkm_pembiayaan_histories')
                ->select('umkm_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                ->groupBy('umkm_pembiayaan_id');

            $diterima = DB::query()
                ->fromSub($latestSub, 'ul')
                ->join('umkm_pembiayaan_histories as uh', 'uh.id', '=', 'ul.latest_id')
                ->join('umkm_pembiayaans as u', 'u.id', '=', 'ul.umkm_pembiayaan_id')
                ->where('u.AO_id', $userId)
                ->where('uh.status_id', 5)
                ->where('uh.jabatan_id', 4)
                ->count();

            $proposal = UmkmPembiayaan::whereNull('akad_id')
                ->where('AO_id', $userId)
                ->count();

            $ditolak = UmkmPembiayaanHistory::where('status_id', 6)
                ->where('user_id', $userId)
                ->count();

            $review = DB::query()
                ->fromSub($latestSub, 'ul2')
                ->join('umkm_pembiayaan_histories as uh2', 'uh2.id', '=', 'ul2.latest_id')
                ->where('uh2.status_id', 7)
                ->count();

            $pipeline1 = DB::query()
                ->fromSub($latestSub, 'ul3')
                ->join('umkm_pembiayaan_histories as uh3', 'uh3.id', '=', 'ul3.latest_id')
                ->join('umkm_pembiayaans as u3', 'u3.id', '=', 'ul3.umkm_pembiayaan_id')
                ->where('u3.AO_id', $userId)
                ->where('uh3.status_id', '!=', 9)
                ->where('uh3.status_id', '!=', 5)
                ->where('uh3.jabatan_id', '!=', 4)
                ->count();

            $cair = UmkmPembiayaan::join('umkm_pembiayaan_histories', 'umkm_pembiayaans.id', '=', 'umkm_pembiayaan_histories.umkm_pembiayaan_id')
                ->where('umkm_pembiayaans.AO_id', $userId)
                ->where('umkm_pembiayaan_histories.status_id', 9)
                ->whereYear('umkm_pembiayaans.tgl_pembiayaan', $year)
                ->sum('nominal_pembiayaan');

            return compact('diterima', 'proposal', 'ditolak', 'review', 'pipeline1', 'cair');
        });

        $data = UmkmPembiayaan::select('id', 'tgl_pembiayaan')->where('AO_id', $userId)->get()->groupBy(function ($data) {
            return Carbon::parse($data->tgl_pembiayaan)->format('M');
        });

        $bulans = [];
        $hitungBulan = [];
        foreach ($data as $bulan => $values) {
            $bulans[] = $bulan;
            $hitungBulan[] = count($values);
        }

        // $plafonds = UmkmPembiayaan::select(DB::raw("MONTHNAME(umkm_pembiayaans.tgl_pembiayaan) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
        // ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
        // ->groupBy(DB::raw("nama_bulan"))
        // ->orderBy('umkm_pembiayaans.id', 'ASC')
        // ->pluck('jml_plafond', 'nama_bulan');

        $plafonds = UmkmPembiayaan::join('umkm_pembiayaan_histories', 'umkm_pembiayaans.id', '=', 'umkm_pembiayaan_histories.umkm_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(umkm_pembiayaans.tgl_pembiayaan) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
            ->where('umkm_pembiayaans.AO_id',  $userId)
            ->where('umkm_pembiayaan_histories.status_id', 9)
            ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('umkm_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');

        $bulanplafonds = $plafonds->keys();
        $hitungPerBulan = $plafonds->values();

        $noas = UmkmPembiayaan::select(DB::raw("MONTHNAME(umkm_pembiayaans.tgl_pembiayaan) as nama_bulan, count(nasabah_id) as noa"))
            ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->pluck('noa', 'nama_bulan');

        $bulannoas = $noas->keys();
        $noaPerBulan = $noas->values();

        // return ($pipeline);
        return view('umkm::index', [
            'title' => 'Dashboard UMKM',
            'data' => $data,
            'bulans' => $bulans,
            'hitungBulan' => $hitungBulan,
            'plafond' => $hitungBulan,
            'labelplafonds' => $bulanplafonds,
            'dataplafonds' => $hitungPerBulan,
            'labelnoas' => $bulannoas,
            'datanoas' => $noaPerBulan,
        ] + $stats);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('umkm::create');
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
        return view('umkm::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('umkm::edit');
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
