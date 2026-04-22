<?php

namespace Modules\Kabag\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Akad\Entities\Pembiayaan;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;

class P3kProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    // public function index()
    // {
    //     // $proposal = P3kPembiayaan::select()->get();

    //     // $proposal = P3kPembiayaanHistory::select()
    //     //     ->latest()
    //     //     ->groupBy('p3k_pembiayaan_id')
    //     //     ->where(function ($query) {
    //     //         $query
    //     //             ->where('status_id', 11)
    //     //             ->where('jabatan_id', 3);
    //     //     })
    //     //     ->orWhere(function ($query) {
    //     //         $query
    //     //             ->where('status_id', 4)
    //     //             ->where('jabatan_id', 2)
    //     //             ->where('user_id', Auth::user()->id);
    //     //     })
    //     //     ->get();

    //     //optimize?
    //     $latestHistories = P3kPembiayaanHistory::select('id', 'p3k_pembiayaan_id')
    //         ->whereIn('id', function ($query) {
    //             $query->select(DB::raw('MAX(id)'))
    //                 ->from('p3k_pembiayaan_histories')
    //                 ->groupBy('p3k_pembiayaan_id');
    //         });

    //     $proposals = P3kPembiayaanHistory::with(['p3kPembiayaan.nasabah.pekerjaan'])
    //         ->joinSub($latestHistories, 'latest_histories', function ($join) {
    //             $join->on('p3k_pembiayaan_histories.id', '=', 'latest_histories.id');
    //         })
    //         ->where(function ($query) {
    //             $query->where('status_id', 11)
    //                 ->where('jabatan_id', 3);
    //         })
    //         ->orWhere(function ($query) {
    //             $query->where('status_id', 4)
    //                 ->where('jabatan_id', 2)
    //                 ->where('user_id', Auth::user()->id);
    //         })
    //         ->latest('p3k_pembiayaan_histories.updated_at')
    //         ->get();

    //     return view('kabag::p3k.proposal.index', [
    //         'title' => 'Proposal P3K',
    //         'proposals' => $proposals,
    //     ]);
    // }

    public function index(Request $request)
    {
        $search = $request->search;

        // Fetch the latest history per `p3k_pembiayaan_id`
        $latestHistories = P3kPembiayaanHistory::select('id', 'p3k_pembiayaan_id')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('p3k_pembiayaan_histories')
                    ->groupBy('p3k_pembiayaan_id');
            });

        // Join with the latest histories and filter for Kabag-specific conditions
        $proposals = P3kPembiayaanHistory::with(['p3kPembiayaan.nasabah.pekerjaan'])
            ->joinSub($latestHistories, 'latest_histories', function ($join) {
                $join->on('p3k_pembiayaan_histories.id', '=', 'latest_histories.id');
            })
            ->where(function ($query) {
                $query->where('status_id', 11)
                    ->where('jabatan_id', 3); // Kabag-specific condition
            })
            ->orWhere(function ($query) {
                $query->where('status_id', 4)
                    ->where('jabatan_id', 2);
            })
            ->where('p3k_pembiayaan_histories.created_at', '>=', Carbon::now()->subMonths(3)) // Date filtering
            ->when($search, fn($q) => $q->whereHas('p3kPembiayaan', fn($q2) => $q2->whereHas('nasabah', fn($q3) => $q3->where('nama_nasabah', 'like', "%{$search}%"))))
            ->latest('p3k_pembiayaan_histories.updated_at')
            ->paginate(10)->withQueryString();

        return view('kabag::p3k.proposal.index', [
            'title' => 'Proposal P3K',
            'proposals' => $proposals,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        //Query Chart Proposal Per Bulan
        $proposalPerBulan = P3kPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'nama_bulan');

        $bulans = $proposalPerBulan->keys();
        $hitungPerBulan = $proposalPerBulan->values();

        //Query Chart Plafond Per Bulan
        $plafondPerBulan = P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(p3k_pembiayaans.created_at) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
            ->where('p3k_pembiayaan_histories.status_id', 9)
            ->whereYear('p3k_pembiayaans.created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('p3k_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');

        $labelPlafond = $plafondPerBulan->keys();
        $dataPlafond = $plafondPerBulan->values();

        //Proposal Berhasil Akad
        $proposalSelesais = P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
            ->select()
            ->where('p3k_pembiayaan_histories.status_id', 9)
            ->get();

        $jmlDisburse = $proposalSelesais->sum('nominal_pembiayaan');
        $jmlMargin = $proposalSelesais->sum('harga_margin');

        $latestSub = P3kPembiayaanHistory::selectRaw('p3k_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('p3k_pembiayaan_id');

        $latestHistories = P3kPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('p3k_pembiayaan_histories.id', '=', 'lh.latest_id');
        })->get(['p3k_pembiayaan_histories.p3k_pembiayaan_id', 'status_id', 'jabatan_id']);

        $proposalP3k = $latestHistories->filter(function ($history) {
            return ($history->status_id == 11 && $history->jabatan_id == 3)
                || ($history->status_id == 4 && $history->jabatan_id == 2);
        })->count();

        $pipeline = $latestHistories->filter(function ($history) {
            return $history->status_id < 9 && !($history->status_id == 5 && $history->jabatan_id == 2);
        })->count();

        $reviewIds = P3kPembiayaan::where('user_id', Auth::id())
            ->whereNotNull('dokumen_ideb')
            ->pluck('id');

        $review = $latestHistories
            ->whereIn('p3k_pembiayaan_id', $reviewIds)
            ->where('status_id', 7)
            ->count();

        $diterima = Pembiayaan::where('segmen', 'P3K')
            ->where('status', 'Selesai Akad')
            ->count();

        $ditolak = P3kPembiayaanHistory::where('status_id', 6)->count();

        $batalAkad = Pembiayaan::where('segmen', 'P3K')
            ->where('status', 'Akad Batal')
            ->count();

        return view('kabag::p3k.index', [
            'title' => 'Dashboard Kabag',
            'proposalSelesais' => $proposalSelesais,
            'jmlDisburse' => $jmlDisburse,
            'jmlMargin' => $jmlMargin,
            'proposalP3k' => $proposalP3k,
            'pipeline' => $pipeline,
            'review' => $review,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'batalAkad' => $batalAkad,
        ], compact(
            'bulans',
            'hitungPerBulan',
            'labelPlafond',
            'dataPlafond',
        ));
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
        $pembiayaan = P3kPembiayaan::with(['nasabah.pekerjaan'])->findOrFail($id);
        $nasabah = $pembiayaan->nasabah;

        $history = P3kPembiayaanHistory::with(['statushistory', 'jabatan'])
            ->where('p3k_pembiayaan_id', $id)
            ->latest('id')
            ->first();

        return view('kabag::proposal.show', [
            'title' => 'Detail Proposal P3K',
            'segmentLabel' => 'P3K',
            'indexUrl' => '/kabag/p3k/proposal',
            'history' => $history,
            'detailsNasabah' => [
                'Nama Nasabah' => optional($nasabah)->nama_nasabah,
                'NIK' => optional($nasabah)->no_ktp,
                'Unit Kerja' => optional(optional($nasabah)->pekerjaan)->nama_unit_kerja,
            ],
            'detailsPembiayaan' => [
                'Tanggal Pengajuan' => $pembiayaan->tanggal_pengajuan,
                'Nominal Pembiayaan' => $pembiayaan->nominal_pembiayaan ? 'Rp. ' . number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.') : null,
                'Tenor' => $pembiayaan->tenor ? $pembiayaan->tenor . ' Bulan' : null,
            ],
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
