<?php

namespace Modules\Analis\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class UmkmProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $latestSub = DB::table('umkm_pembiayaan_histories')
            ->selectRaw('umkm_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('umkm_pembiayaan_id');

        $proposalIds = DB::table('umkm_pembiayaan_histories as h')
            ->joinSub($latestSub, 'lh', 'h.id', '=', 'lh.latest_id')
            ->where(function ($q) {
                $q->where(function ($q2) {
                    $q2->where('h.status_id', 3)->where('h.jabatan_id', 1);
                })->orWhere(function ($q2) {
                    $q2->where('h.status_id', 4)->where('h.jabatan_id', 3);
                });
            })
            ->pluck('h.umkm_pembiayaan_id');

        $proposals = UmkmPembiayaan::with(['nasabahh', 'keteranganusaha', 'user'])
            ->whereIn('id', $proposalIds)
            ->when($search, fn($q) => $q->whereHas(
                'nasabahh',
                fn($q2) =>
                $q2->where('nama_nasabah', 'like', "%$search%")->orWhere('alamat', 'like', "%$search%")
            ))
            ->orderBy('tgl_pembiayaan', 'desc')
            ->paginate(10)->withQueryString();

        $histories = UmkmPembiayaanHistory::with(['statushistory', 'jabatan'])
            ->whereIn('id', function ($q) {
                $q->selectRaw('MAX(id)')->from('umkm_pembiayaan_histories')->groupBy('umkm_pembiayaan_id');
            })
            ->whereIn('umkm_pembiayaan_id', $proposalIds)
            ->get()
            ->keyBy('umkm_pembiayaan_id');

        return view('analis::umkm.proposal.index', [
            'title' => 'Data Nasabah',
            'proposals' => $proposals,
            'histories' => $histories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {


        $data = UmkmPembiayaan::select('id', 'created_at')->where('AO_id', Auth::user()->id)->get()->groupBy(function ($data) {
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

        $target1 = UmkmPembiayaan::join('umkm_pembiayaan_histories', 'umkm_pembiayaans.id', '=', 'umkm_pembiayaan_histories.umkm_pembiayaan_id')
            ->select()
            ->where('umkm_pembiayaan_histories.status_id', 9)
            ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
            ->get();

        $latestSub = UmkmPembiayaanHistory::selectRaw('umkm_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('umkm_pembiayaan_id');

        $latestHistories = UmkmPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('umkm_pembiayaan_histories.id', '=', 'lh.latest_id');
        })->get([
            'umkm_pembiayaan_histories.umkm_pembiayaan_id',
            'status_id',
            'jabatan_id',
        ]);

        $proposal = $latestHistories->filter(function ($history) {
            return ($history->status_id == 5 && $history->jabatan_id == 2)
                || ($history->status_id == 4 && $history->jabatan_id == 3);
        })->count();

        $diterima = UmkmPembiayaanHistory::where('status_id', 5)
            ->where('jabatan_id', 4)
            ->count();

        $ditolak = UmkmPembiayaanHistory::where('status_id', 6)->count();

        $review = UmkmPembiayaanHistory::where('status_id', 7)->count();

        $pipeline1 = $latestHistories->filter(function ($history) {
            return $history->status_id != 9
                && $history->status_id != 5
                && $history->jabatan_id != 4;
        })->count();

        $cair = $target1->sum('nominal_pembiayaan');

        $pipeline = UmkmPembiayaan::select()
            ->whereYear('tgl_pembiayaan', date('Y'))
            ->count();

        // return ($noas);
        return view('analis::umkm.index', [
            'title' => 'Dashboard UMKM',
            'data' => $data,
            'bulans' => $bulans,
            'hitungBulan' => $hitungBulan,
            'plafond' => $hitungBulan,
            'labelplafonds' => $bulanplafonds,
            'dataplafonds' => $hitungPerBulan,
            'labelnoas' => $bulannoas,
            'datanoas' => $noaPerBulan,
            'target1' => $target1,
            'pipeline' => $pipeline,
            'proposal' => $proposal,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'review' => $review,
            'pipeline1' => $pipeline1,
            'cair' => $cair,
        ]);
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
        return view('analis::show');
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
