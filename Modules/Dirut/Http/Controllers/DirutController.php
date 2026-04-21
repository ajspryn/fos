<?php

namespace Modules\Dirut\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Akad\Entities\Pembiayaan;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Form\Entities\SkpdPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaan;

class DirutController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        //Proposal
        $pasarproposal = PasarPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->count();
        $skpdproposal = SkpdPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->count();
        $umkmproposal = UmkmPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->count();
        $pprproposal = PprPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->count();

        //Diterima (Selesai Akad)
        $pasarditerima = Pembiayaan::select()->where('segmen', 'Pasar')->where('status', 'Selesai Akad')->count();
        $skpdditerima = Pembiayaan::select()->where('segmen', 'SKPD')->where('status', 'Selesai Akad')->count();
        $umkmditerima = Pembiayaan::select()->where('segmen', 'UMKM')->where('status', 'Selesai Akad')->count();
        $pprditerima = Pembiayaan::select()->where('segmen', 'PPR')->where('status', 'Selesai Akad')->count();

        //Ditolak
        $pasarditolak = PasarPembiayaanHistory::select()->latest()->where('status_id', 6)->count();
        $skpdditolak = SkpdPembiayaanHistory::select()->latest()->where('status_id', 6)->count();
        $umkmditolak = UmkmPembiayaanHistory::select()->latest()->where('status_id', 6)->count();
        $pprditolak = PprPembiayaanHistory::select()->latest()->where('status_id', 6)->count();

        //Batal Akad
        $pasarBatal = Pembiayaan::select()->where('segmen', 'Pasar')->where('status', 'Akad Batal')->count();
        $skpdBatal = Pembiayaan::select()->where('segmen', 'SKPD')->where('status', 'Akad Batal')->count();
        $umkmBatal = Pembiayaan::select()->where('segmen', 'UMKM')->where('status', 'Akad Batal')->count();
        $pprBatal = Pembiayaan::select()->where('segmen', 'PPR')->where('status', 'Akad Batal')->count();

        // --- Dashboard counts (avoid N+1 in Blade & controller) ---
        $pasarLatestSub = DB::table('pasar_pembiayaan_histories')
            ->select('pasar_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
            ->groupBy('pasar_pembiayaan_id');

        $skpdLatestSub = DB::table('skpd_pembiayaan_histories')
            ->select('skpd_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
            ->groupBy('skpd_pembiayaan_id');

        $umkmLatestSub = DB::table('umkm_pembiayaan_histories')
            ->select('umkm_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
            ->groupBy('umkm_pembiayaan_id');

        $pprLatestSub = DB::table('ppr_pembiayaan_histories')
            ->select('form_ppr_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
            ->groupBy('form_ppr_pembiayaan_id');

        // Review counts (latest history status_id = 7)
        $umkmreview = DB::query()
            ->fromSub($umkmLatestSub, 'ul')
            ->join('umkm_pembiayaan_histories as uh', 'uh.id', '=', 'ul.latest_id')
            ->join('umkm_pembiayaans as u', 'u.id', '=', 'ul.umkm_pembiayaan_id')
            ->whereNotNull('u.sektor_id')
            ->where('uh.status_id', 7)
            ->count();

        $pasarreview = DB::query()
            ->fromSub($pasarLatestSub, 'pl')
            ->join('pasar_pembiayaan_histories as ph', 'ph.id', '=', 'pl.latest_id')
            ->join('pasar_pembiayaans as p', 'p.id', '=', 'pl.pasar_pembiayaan_id')
            ->whereNotNull('p.sektor_id')
            ->where('ph.status_id', 7)
            ->count();

        $skpdreview = DB::query()
            ->fromSub($skpdLatestSub, 'sl')
            ->join('skpd_pembiayaan_histories as sh', 'sh.id', '=', 'sl.latest_id')
            ->join('skpd_pembiayaans as s', 's.id', '=', 'sl.skpd_pembiayaan_id')
            ->whereNotNull('s.skpd_sektor_ekonomi_id')
            ->where('sh.status_id', 7)
            ->count();

        $pprreview = DB::query()
            ->fromSub($pprLatestSub, 'prl')
            ->join('ppr_pembiayaan_histories as prh', 'prh.id', '=', 'prl.latest_id')
            ->where('prh.status_id', 7)
            ->count();

        // Pengajuan counts (as previously calculated in Blade)
        $skpdHasStatus3 = DB::table('skpd_pembiayaan_histories')
            ->select('skpd_pembiayaan_id')
            ->where('status_id', 3)
            ->distinct();

        $proposalskpd = DB::query()
            ->fromSub($skpdLatestSub, 'sl2')
            ->join('skpd_pembiayaan_histories as sh2', 'sh2.id', '=', 'sl2.latest_id')
            ->joinSub($skpdHasStatus3, 's3', 's3.skpd_pembiayaan_id', '=', 'sl2.skpd_pembiayaan_id')
            ->where(function ($q) {
                $q->where(function ($q2) {
                    $q2->where('sh2.jabatan_id', 3)->where('sh2.status_id', 5);
                })->orWhere(function ($q2) {
                    $q2->where('sh2.jabatan_id', 4)->where('sh2.status_id', 4);
                });
            })
            ->count();

        $data = DB::query()
            ->fromSub($pasarLatestSub, 'pl2')
            ->join('pasar_pembiayaan_histories as ph2', 'ph2.id', '=', 'pl2.latest_id')
            ->where(function ($q) {
                $q->where(function ($q2) {
                    $q2->where('ph2.jabatan_id', 3)->where('ph2.status_id', 5);
                })->orWhere(function ($q2) {
                    $q2->where('ph2.jabatan_id', 4)->where('ph2.status_id', 4);
                });
            })
            ->count();

        $umkmHasStatus3 = DB::table('umkm_pembiayaan_histories')
            ->select('umkm_pembiayaan_id')
            ->where('status_id', 3)
            ->distinct();

        $b = DB::query()
            ->fromSub($umkmLatestSub, 'ul2')
            ->join('umkm_pembiayaan_histories as uh2', 'uh2.id', '=', 'ul2.latest_id')
            ->joinSub($umkmHasStatus3, 'u3', 'u3.umkm_pembiayaan_id', '=', 'ul2.umkm_pembiayaan_id')
            ->where(function ($q) {
                $q->where(function ($q2) {
                    $q2->where('uh2.jabatan_id', 3)->where('uh2.status_id', 5);
                })->orWhere(function ($q2) {
                    $q2->where('uh2.jabatan_id', 4)->where('uh2.status_id', 4);
                });
            })
            ->count();

        $pprHasStatus3 = DB::table('ppr_pembiayaan_histories')
            ->select('form_ppr_pembiayaan_id')
            ->where('status_id', 3)
            ->distinct();

        $proposalppr = DB::query()
            ->fromSub($pprLatestSub, 'prl2')
            ->join('ppr_pembiayaan_histories as prh2', 'prh2.id', '=', 'prl2.latest_id')
            ->joinSub($pprHasStatus3, 'p3', 'p3.form_ppr_pembiayaan_id', '=', 'prl2.form_ppr_pembiayaan_id')
            ->where(function ($q) {
                $q->where(function ($q2) {
                    $q2->where('prh2.jabatan_id', 3)->where('prh2.status_id', 5);
                })->orWhere(function ($q2) {
                    $q2->where('prh2.jabatan_id', 4)->where('prh2.status_id', 4);
                });
            })
            ->count();

        // Pipeline counts (as previously calculated in Blade)
        $pipelinepasar = DB::query()
            ->fromSub($pasarLatestSub, 'pl3')
            ->join('pasar_pembiayaan_histories as ph3', 'ph3.id', '=', 'pl3.latest_id')
            ->where('ph3.status_id', '!=', 9)
            ->where(function ($q) {
                $q->where('ph3.status_id', '!=', 5)->orWhere('ph3.jabatan_id', '!=', 4);
            })
            ->count();

        $pipelineskpd = DB::query()
            ->fromSub($skpdLatestSub, 'sl3')
            ->join('skpd_pembiayaan_histories as sh3', 'sh3.id', '=', 'sl3.latest_id')
            ->where('sh3.status_id', '!=', 9)
            ->where(function ($q) {
                $q->where('sh3.status_id', '!=', 5)->orWhere('sh3.jabatan_id', '!=', 4);
            })
            ->count();

        $pipelineumkm = DB::query()
            ->fromSub($umkmLatestSub, 'ul3')
            ->join('umkm_pembiayaan_histories as uh3', 'uh3.id', '=', 'ul3.latest_id')
            ->where('uh3.status_id', '!=', 9)
            ->where('uh3.status_id', '!=', 5)
            ->where('uh3.jabatan_id', '!=', 4)
            ->count();

        $cairpasar = PasarPembiayaan::join('pasar_pembiayaan_histories', 'pasar_pembiayaans.id', '=', 'pasar_pembiayaan_histories.pasar_pembiayaan_id')
            ->select()
            ->where('pasar_pembiayaan_histories.status_id', 9)
            ->whereYear('pasar_pembiayaans.tgl_pembiayaan', date('Y'))
            ->get();


        $cairumkm = UmkmPembiayaan::join('umkm_pembiayaan_histories', 'umkm_pembiayaans.id', '=', 'umkm_pembiayaan_histories.umkm_pembiayaan_id')
            ->select()
            ->where('umkm_pembiayaan_histories.status_id', 9)
            ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
            ->get();


        $cairskpd = SkpdPembiayaan::join('skpd_pembiayaan_histories', 'skpd_pembiayaans.id', '=', 'skpd_pembiayaan_histories.skpd_pembiayaan_id')
            ->select()
            ->where('skpd_pembiayaan_histories.status_id', 9)
            ->whereYear('skpd_pembiayaans.tanggal_pengajuan', date('Y'))
            ->get();

        $cairppr = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select()
            ->where('ppr_pembiayaan_histories.status_id', 9)
            ->whereYear('form_ppr_pembiayaans.created_at', date('Y'))
            ->get();


        //Query Chart Proposal Per Bulan
        $proposalPerBulan = Pembiayaan::where('status', 'Selesai Akad')
            ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'nama_bulan');

        $bulans = $proposalPerBulan->keys();
        $hitungPerBulan = $proposalPerBulan->values();

        //Query Chart Proposal Per Segmen
        $proposalPerSegmen = Pembiayaan::where('status', 'Selesai Akad')
            ->select('segmen', DB::raw("COUNT('id') as count"))
            ->groupBy('segmen')
            ->pluck('count', 'segmen');

        $labelSegmen = $proposalPerSegmen->keys();
        $dataSegmen = $proposalPerSegmen->values();

        //Query Chart Disburse Per Bulan
        $disbursePerBulan = Pembiayaan::where('status', 'Selesai Akad')
            ->select(DB::raw("MONTHNAME(created_at) as nama_bulan, sum(plafond) as jml_disburse"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('id', 'ASC')
            ->pluck('jml_disburse', 'nama_bulan');

        //Query Chart Disburse Per Bulan
        // $disbursePerBulan = Pembiayaan::where('status', 'Selesai Akad')
        // ->select(DB::raw("MONTHNAME(created_at) as nama_bulan, sum(plafond) as jml_disburse"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw("nama_bulan"))
        // ->orderBy('id', 'ASC')
        // ->pluck('jml_disburse', 'nama_bulan');

        $labelDisburse = $disbursePerBulan->keys();
        $dataDisburse = $disbursePerBulan->values();
        // dd($dataSegmen);
        // return $pprditerima;
        // Keep disburse calculations consistent with existing Blade logic
        $disbursepasar = $cairpasar->sum('harga');
        $disburseumkm = $cairumkm->sum('harga');
        $disburseskpd = $cairskpd->sum('harga');
        $disburseppr = $cairppr->sum('form_permohonan_nilai_ppr_dimohon');

        return view('dirut::index', [
            'title' => 'Dashboard Direktur Utama',
            'proposal' => $pasarproposal + $skpdproposal + $umkmproposal + $pprproposal,
            'diterima' => $pasarditerima + $skpdditerima + $umkmditerima + $pprditerima,
            'ditolak' => $pasarditolak + $skpdditolak + $umkmditolak + $pprditolak,
            'batalAkad' => $pasarBatal + $skpdBatal + $umkmBatal + $pprBatal,
            'review' => $pasarreview + $skpdreview + $umkmreview + $pprreview,
            // Values used by the dashboard Blade (remove heavy DB work in Blade)
            'proposalskpd' => $proposalskpd,
            'data' => $data,
            'b' => $b,
            'proposalppr' => $proposalppr,
            'pipelinepasar' => $pipelinepasar,
            'pipelineskpd' => $pipelineskpd,
            'pipelineumkm' => $pipelineumkm,
            'disbursepasar' => $disbursepasar,
            'disburseumkm' => $disburseumkm,
            'disburseskpd' => $disburseskpd,
            'disburseppr' => $disburseppr,
        ], compact(
            'bulans',
            'hitungPerBulan',
            'labelSegmen',
            'dataSegmen',
            'labelDisburse',
            'dataDisburse'
        ));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dirut::create');
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
