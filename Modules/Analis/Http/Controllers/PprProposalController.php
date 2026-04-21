<?php

namespace Modules\Analis\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Form\Entities\FormPprPembiayaan;
use Illuminate\Support\Facades\DB;

class PprProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $latestSub = DB::table('ppr_pembiayaan_histories')
            ->selectRaw('form_ppr_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('form_ppr_pembiayaan_id');

        $proposalIds = DB::table('ppr_pembiayaan_histories as h')
            ->joinSub($latestSub, 'lh', 'h.id', '=', 'lh.latest_id')
            ->where(function ($q) {
                $q->where(function ($q2) {
                    $q2->where('h.status_id', 3)->where('h.jabatan_id', 1);
                })->orWhere(function ($q2) {
                    $q2->where('h.status_id', 4)->where('h.jabatan_id', 3);
                });
            })
            ->pluck('h.form_ppr_pembiayaan_id');

        $proposals = FormPprPembiayaan::with(['pemohon', 'user'])
            ->whereIn('id', $proposalIds)
            ->when($search, fn($q) => $q->whereHas(
                'pemohon',
                fn($q2) =>
                $q2->where('form_pribadi_pemohon_nama_lengkap', 'like', "%$search%")
                    ->orWhere('form_pribadi_pemohon_no_ktp', 'like', "%$search%")
            ))
            ->orderBy('created_at', 'desc')
            ->paginate(10)->withQueryString();

        $histories = PprPembiayaanHistory::with(['statushistory', 'jabatan'])
            ->whereIn('id', function ($q) {
                $q->selectRaw('MAX(id)')->from('ppr_pembiayaan_histories')->groupBy('form_ppr_pembiayaan_id');
            })
            ->whereIn('form_ppr_pembiayaan_id', $proposalIds)
            ->get()
            ->keyBy('form_ppr_pembiayaan_id');

        return view('analis::ppr.proposal.index', [
            'title' => 'Proposal PPR',
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

        //Proposal Berhasil Akad
        $proposalSelesais = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select()
            ->where('ppr_pembiayaan_histories.status_id', 9)
            ->get();

        $latestSub = PprPembiayaanHistory::selectRaw('form_ppr_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('form_ppr_pembiayaan_id');

        $latestHistories = PprPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('ppr_pembiayaan_histories.id', '=', 'lh.latest_id');
        })->get([
            'ppr_pembiayaan_histories.form_ppr_pembiayaan_id',
            'status_id',
            'jabatan_id',
            'user_id',
        ]);

        $diterima = DB::table('pembiayaans')
            ->where('segmen', 'PPR')
            ->where('status', 'Selesai Akad')
            ->count();

        $batalAkad = DB::table('pembiayaans')
            ->where('segmen', 'PPR')
            ->where('status', 'Akad Batal')
            ->count();

        $proposalppr = $latestHistories->filter(function ($history) {
            return ($history->status_id == 5 && $history->jabatan_id == 2)
                || ($history->status_id == 4 && $history->jabatan_id == 3);
        })->count();

        $reviewIds = FormPprPembiayaan::where('user_id', Auth::user()->id)
            ->whereNotNull('dilengkapi_ao')
            ->pluck('id');

        $review = $latestHistories->whereIn('form_ppr_pembiayaan_id', $reviewIds)
            ->filter(function ($history) {
                return $history->status_id == 7;
            })->count();

        $pipeline = $latestHistories->filter(function ($history) {
            return $history->status_id < 9
                && !($history->status_id == 5 && $history->jabatan_id == 4);
        })->count();

        $ditolak = PprPembiayaanHistory::where('status_id', 6)->count();

        $jmlDisburse = $proposalSelesais->sum('form_permohonan_nilai_ppr_dimohon');
        $jmlMargin = $proposalSelesais->sum('form_permohonan_jml_margin');

        return view('analis::ppr.index', [
            'title' => 'Dashboard Analis',
            'proposalSelesais' => $proposalSelesais,
            'diterima' => $diterima,
            'proposalppr' => $proposalppr,
            'ditolak' => $ditolak,
            'review' => $review,
            'pipeline' => $pipeline,
            'batalAkad' => $batalAkad,
            'jmlDisburse' => $jmlDisburse,
            'jmlMargin' => $jmlMargin,
        ], compact(
            'bulans',
            'hitungPerBulan',
            'labelPlafond',
            'dataPlafond',
            'labelJenisNasabah',
            'dataJenisNasabah',
            'labelNoaProyekPerumahan',
            'dataNoaProyekPerumahan'
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
