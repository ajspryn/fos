<?php

namespace Modules\Ppr\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Modules\Form\Entities\FormPprPembiayaan;
use Illuminate\Support\Facades\DB;
use Modules\Akad\Entities\Pembiayaan;
use Modules\Ppr\Entities\PprPembiayaanHistory;

class PprController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $userId = Auth::user()->id;

        $dashboardData = Cache::remember("ppr.dashboard.{$userId}." . now()->format('Y-m'), now()->addMinutes(5), function () use ($userId) {
            // Chart: Proposal per bulan
            $proposalPerBulan = FormPprPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
                ->where('user_id', $userId)
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("nama_bulan"))
                ->orderBy('id', 'ASC')
                ->pluck('count', 'nama_bulan');

            // Chart: Plafond per bulan
            $plafondPerBulan = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
                ->select(DB::raw("MONTHNAME(form_ppr_pembiayaans.created_at) as nama_bulan, sum(form_permohonan_nilai_ppr_dimohon) as jml_plafond"))
                ->where('form_ppr_pembiayaans.user_id', $userId)
                ->where('ppr_pembiayaan_histories.status_id', 9)
                ->whereYear('form_ppr_pembiayaans.created_at', date('Y'))
                ->groupBy(DB::raw("nama_bulan"))
                ->orderBy('form_ppr_pembiayaans.id', 'ASC')
                ->pluck('jml_plafond', 'nama_bulan');

            // Chart: Jenis Nasabah
            $jenisNasabah = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
                ->select('jenis_nasabah', DB::raw("COUNT('id') as count"))
                ->where('form_ppr_pembiayaans.user_id', $userId)
                ->where('ppr_pembiayaan_histories.status_id', 9)
                ->groupBy('jenis_nasabah')
                ->pluck('count', 'jenis_nasabah');

            // Chart: NOA Proyek Perumahan
            $noaProyekPerumahan = FormPprPembiayaan::join('form_ppr_data_agunans', 'form_ppr_pembiayaans.id', '=', 'form_ppr_data_agunans.form_ppr_pembiayaan_id')
                ->join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
                ->select(DB::raw('COUNT(form_agunan_1_nama_proyek_perumahan) as proyek_perumahan, form_agunan_1_nama_proyek_perumahan, COUNT(form_ppr_data_pribadi_id) as noa'))
                ->where('form_ppr_pembiayaans.user_id', $userId)
                ->where('ppr_pembiayaan_histories.status_id', 9)
                ->groupBy('form_agunan_1_nama_proyek_perumahan')
                ->pluck('proyek_perumahan', 'form_agunan_1_nama_proyek_perumahan');

            // Target (bulan berjalan)
            $targets = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
                ->select()
                ->where('form_ppr_pembiayaans.user_id', $userId)
                ->where('ppr_pembiayaan_histories.status_id', 9)
                ->whereYear('form_ppr_pembiayaans.created_at', Carbon::now()->year)
                ->whereMonth('form_ppr_pembiayaans.created_at', Carbon::now()->month)
                ->get();

            $cair = $targets->sum('form_permohonan_nilai_ppr_dimohon');
            $targetNominal = 1500000000;

            // Dashboard counts (avoid N+1)
            $proposal = FormPprPembiayaan::where('user_id', $userId)
                ->where(function ($query) {
                    $query->whereNull('dilengkapi_ao')
                        ->orWhereNull('form_cl')
                        ->orWhereNull('form_score');
                })
                ->count();

            $ditolak = PprPembiayaanHistory::where('user_id', $userId)
                ->where('status_id', 6)
                ->count();

            $diterima = Pembiayaan::where('ao_id', $userId)
                ->where('status', 'Selesai Akad')
                ->count();

            $batalAkad = Pembiayaan::where('ao_id', $userId)
                ->where('status', 'Akad Batal')
                ->count();

            $pprIds = FormPprPembiayaan::where('user_id', $userId)->pluck('id');
            $latestHistorySub = PprPembiayaanHistory::selectRaw('MAX(id) as latest_id')
                ->groupBy('form_ppr_pembiayaan_id');

            $latestHistories = PprPembiayaanHistory::joinSub($latestHistorySub, 'lh', function ($join) {
                $join->on('ppr_pembiayaan_histories.id', '=', 'lh.latest_id');
            })
                ->whereIn('ppr_pembiayaan_histories.form_ppr_pembiayaan_id', $pprIds)
                ->get([
                    'ppr_pembiayaan_histories.form_ppr_pembiayaan_id',
                    'status_id',
                    'jabatan_id'
                ]);

            $pipeline = $latestHistories->filter(function ($history) {
                return $history->status_id < 9 && !($history->status_id == 5 && $history->jabatan_id == 4);
            })->count();

            $komiteIds = FormPprPembiayaan::where('user_id', $userId)
                ->whereNotNull('dilengkapi_ao')
                ->pluck('id');

            $review = $latestHistories
                ->whereIn('form_ppr_pembiayaan_id', $komiteIds)
                ->where('status_id', 7)
                ->count();

            return [
                'bulans' => $proposalPerBulan->keys(),
                'hitungPerBulan' => $proposalPerBulan->values(),
                'labelPlafond' => $plafondPerBulan->keys(),
                'dataPlafond' => $plafondPerBulan->values(),
                'labelJenisNasabah' => $jenisNasabah->keys(),
                'dataJenisNasabah' => $jenisNasabah->values(),
                'labelNoaProyekPerumahan' => $noaProyekPerumahan->keys(),
                'dataNoaProyekPerumahan' => $noaProyekPerumahan->values(),
                'targets' => $targets,
                'cair' => $cair,
                'targetNominal' => $targetNominal,
                'proposal' => $proposal,
                'ditolak' => $ditolak,
                'diterima' => $diterima,
                'batalAkad' => $batalAkad,
                'pipeline' => $pipeline,
                'review' => $review,
            ];
        });

        return view('ppr::index', array_merge([
            'title' => 'Dashboard PPR',
        ], $dashboardData));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ppr::create');
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
        return view('ppr::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ppr::edit');
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
