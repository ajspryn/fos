<?php

namespace Modules\Dirut\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

class UmkmProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $year = date('Y');

        $stats = Cache::remember("dirut:umkm:stats:{$year}", 300, function () use ($year) {
            $umkmLatestSub = DB::table('umkm_pembiayaan_histories')
                ->select('umkm_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                ->groupBy('umkm_pembiayaan_id');

            $umkmHasStatus3 = DB::table('umkm_pembiayaan_histories')
                ->select('umkm_pembiayaan_id')
                ->where('status_id', 3)
                ->distinct();

            $b = DB::query()
                ->fromSub($umkmLatestSub, 'ul')
                ->join('umkm_pembiayaan_histories as uh', 'uh.id', '=', 'ul.latest_id')
                ->joinSub($umkmHasStatus3, 'u3', 'u3.umkm_pembiayaan_id', '=', 'ul.umkm_pembiayaan_id')
                ->where(function ($q) {
                    $q->where(function ($q2) {
                        $q2->where('uh.jabatan_id', 3)->where('uh.status_id', 5);
                    })->orWhere(function ($q2) {
                        $q2->where('uh.jabatan_id', 4)->where('uh.status_id', 4);
                    });
                })
                ->count();

            $diterima = DB::query()
                ->fromSub($umkmLatestSub, 'ul2')
                ->join('umkm_pembiayaan_histories as uh2', 'uh2.id', '=', 'ul2.latest_id')
                ->where('uh2.status_id', 5)
                ->where('uh2.jabatan_id', 4)
                ->count();

            $ditolak = UmkmPembiayaanHistory::where('status_id', 6)->count();

            $review = DB::query()
                ->fromSub($umkmLatestSub, 'ul3')
                ->join('umkm_pembiayaan_histories as uh3', 'uh3.id', '=', 'ul3.latest_id')
                ->join('umkm_pembiayaans as u', 'u.id', '=', 'ul3.umkm_pembiayaan_id')
                ->whereNotNull('u.sektor_id')
                ->where('uh3.status_id', 7)
                ->count();

            $pipeline1 = DB::query()
                ->fromSub($umkmLatestSub, 'ul4')
                ->join('umkm_pembiayaan_histories as uh4', 'uh4.id', '=', 'ul4.latest_id')
                ->where('uh4.status_id', '!=', 9)
                ->where('uh4.status_id', '!=', 5)
                ->where('uh4.jabatan_id', '!=', 4)
                ->count();

            $cair = UmkmPembiayaan::join('umkm_pembiayaan_histories', 'umkm_pembiayaans.id', '=', 'umkm_pembiayaan_histories.umkm_pembiayaan_id')
                ->where('umkm_pembiayaan_histories.status_id', 9)
                ->whereYear('umkm_pembiayaans.tgl_pembiayaan', $year)
                ->sum('nominal_pembiayaan');

            return compact('b', 'diterima', 'ditolak', 'review', 'pipeline1', 'cair');
        });

        $data = UmkmPembiayaan::select('id', 'created_at')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
        });

        $bulans = [];
        $hitungBulan = [];
        foreach ($data as $bulan => $values) {
            $bulans[] = $bulan;
            $hitungBulan[] = count($values);
        }

        $plafonds = UmkmPembiayaan::join('umkm_pembiayaan_histories', 'umkm_pembiayaans.id', '=', 'umkm_pembiayaan_histories.umkm_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(umkm_pembiayaans.tgl_pembiayaan) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
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
            ->orderBy('umkm_pembiayaans.id', 'ASC')
            ->pluck('noa', 'nama_bulan');

        $bulannoas = $noas->keys();
        $noaPerBulan = $noas->values();

        // return ($noas);
        return view('dirut::umkm.index', [
            'title' => 'Dashboard UMKM',
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
        return view('dirut::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dirut::edit');
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
