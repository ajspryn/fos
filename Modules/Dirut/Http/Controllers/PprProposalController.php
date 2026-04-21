<?php

namespace Modules\Dirut\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Form\Entities\FormPprPembiayaan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Akad\Entities\Pembiayaan;
use Modules\Ppr\Entities\PprPembiayaanHistory;

class PprProposalController extends Controller
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
        $userId = Auth::id();

        $proposalSelesais = Cache::remember('dirut:ppr:proposal-selesai', 300, function () {
            return FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
                ->select()
                ->where('ppr_pembiayaan_histories.status_id', 9)
                ->get();
        });

        $stats = Cache::remember("dirut:ppr:stats:user:{$userId}", 300, function () use ($userId) {
            $pprLatestSub = DB::table('ppr_pembiayaan_histories')
                ->select('form_ppr_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                ->groupBy('form_ppr_pembiayaan_id');

            $proposalppr = DB::query()
                ->fromSub($pprLatestSub, 'pl')
                ->join('ppr_pembiayaan_histories as ph', 'ph.id', '=', 'pl.latest_id')
                ->where(function ($q) {
                    $q->where(function ($q2) {
                        $q2->where('ph.jabatan_id', 3)->where('ph.status_id', 5);
                    })->orWhere(function ($q2) {
                        $q2->where('ph.jabatan_id', 4)->where('ph.status_id', 4);
                    });
                })
                ->count();

            $ditolak = PprPembiayaanHistory::where('status_id', 6)->count();

            $review = DB::query()
                ->fromSub($pprLatestSub, 'pl2')
                ->join('ppr_pembiayaan_histories as ph2', 'ph2.id', '=', 'pl2.latest_id')
                ->join('form_ppr_pembiayaans as fp', 'fp.id', '=', 'pl2.form_ppr_pembiayaan_id')
                ->where('fp.user_id', $userId)
                ->whereNotNull('fp.dilengkapi_ao')
                ->where('ph2.status_id', 7)
                ->count();

            $pipeline = DB::query()
                ->fromSub($pprLatestSub, 'pl3')
                ->join('ppr_pembiayaan_histories as ph3', 'ph3.id', '=', 'pl3.latest_id')
                ->where('ph3.status_id', '<', 9)
                ->where(function ($q) {
                    $q->where('ph3.status_id', '!=', 5)->orWhere('ph3.jabatan_id', '!=', 4);
                })
                ->count();

            $diterima = Pembiayaan::where('segmen', 'PPR')
                ->where('status', 'Selesai Akad')
                ->count();

            $batalAkad = Pembiayaan::where('segmen', 'PPR')
                ->where('status', 'Akad Batal')
                ->count();

            return compact('proposalppr', 'ditolak', 'review', 'pipeline', 'diterima', 'batalAkad');
        });

        //Query Chart Proposal Per Bulan
        $proposalPerBulan = FormPprPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'nama_bulan');

        $bulans = $proposalPerBulan->keys();
        $hitungPerBulan = $proposalPerBulan->values();

        //Query Chart Plafond Per Bulan
        $plafondPerBulan = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(form_ppr_pembiayaans.created_at) as nama_bulan, sum(form_permohonan_nilai_ppr_dimohon) as jml_plafond"))
            ->where('ppr_pembiayaan_histories.status_id', 9)
            ->whereYear('form_ppr_pembiayaans.created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('form_ppr_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');

        $labelPlafond = $plafondPerBulan->keys();
        $dataPlafond = $plafondPerBulan->values();

        //Query Chart Jenis Nasabah
        $jenisNasabah = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select('jenis_nasabah', DB::raw("COUNT('id') as count"))
            ->where('ppr_pembiayaan_histories.status_id', 9)
            ->groupBy('jenis_nasabah')
            ->pluck('count', 'jenis_nasabah');

        $labelJenisNasabah = $jenisNasabah->keys();
        $dataJenisNasabah = $jenisNasabah->values();

        //Query Chart NOA Proyek Perumahan
        $noaProyekPerumahan = FormPprPembiayaan::join('form_ppr_data_agunans', 'form_ppr_pembiayaans.id', '=', 'form_ppr_data_agunans.form_ppr_pembiayaan_id')
            ->join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select(DB::raw('COUNT(form_agunan_1_nama_proyek_perumahan) as proyek_perumahan, form_agunan_1_nama_proyek_perumahan, COUNT(form_ppr_data_pribadi_id) as noa'))
            ->where('ppr_pembiayaan_histories.status_id', 9)
            ->groupBy('form_agunan_1_nama_proyek_perumahan')
            ->pluck('proyek_perumahan', 'form_agunan_1_nama_proyek_perumahan');

        $labelNoaProyekPerumahan = $noaProyekPerumahan->keys();
        $dataNoaProyekPerumahan = $noaProyekPerumahan->values();

        return view('dirut::ppr.index', [
            'title' => 'Dashboard Direktur Bisnis',
            'proposalSelesais' => $proposalSelesais,
            'jmlDisburse' => $proposalSelesais->sum('form_permohonan_nilai_ppr_dimohon'),
            'jmlMargin' => $proposalSelesais->sum('form_permohonan_jml_margin'),
        ], compact(
            'bulans',
            'hitungPerBulan',
            'labelPlafond',
            'dataPlafond',
            'labelJenisNasabah',
            'dataJenisNasabah',
            'labelNoaProyekPerumahan',
            'dataNoaProyekPerumahan'
        ) + $stats);
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
