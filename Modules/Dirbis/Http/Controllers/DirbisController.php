<?php

namespace Modules\Dirbis\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Form\Entities\SkpdPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaan;

class DirbisController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pasarproposal = PasarPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $skpdproposal = SkpdPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $umkmproposal = UmkmPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $pprproposal = PprPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $pasarditerima = PasarPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $skpdditerima = SkpdPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $umkmditerima = UmkmPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $pprditerima = PprPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $pasarditolak = PasarPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $skpdditolak = SkpdPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $umkmditolak = UmkmPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $pprditolak = PprPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $pasarreview = PasarPembiayaanHistory::select()->where('status_id', 7)->orderby('created_at', 'desc')->get()->count();
        $skpdreview = SkpdPembiayaanHistory::select()->where('status_id', 7)->orderby('created_at', 'desc')->get()->count();
        $umkmreview = UmkmPembiayaanHistory::select()->where('status_id', 7)->orderby('created_at', 'desc')->get()->count();
        $pprreview = PprPembiayaanHistory::select()->where('status_id', 7)->orderby('created_at', 'desc')->get()->count();

        $cairpasar = PasarPembiayaan::join('pasar_pembiayaan_histories', 'pasar_pembiayaans.id', '=', 'pasar_pembiayaan_histories.pasar_pembiayaan_id')
            ->select()
            ->where('pasar_pembiayaan_histories.jabatan_id', 4)
            ->where('pasar_pembiayaan_histories.status_id', 5)
            ->whereYear('pasar_pembiayaans.tgl_pembiayaan', date('Y'))
            ->get();


        $cairumkm = UmkmPembiayaan::join('umkm_pembiayaan_histories', 'umkm_pembiayaans.id', '=', 'umkm_pembiayaan_histories.umkm_pembiayaan_id')
            ->select()
            ->where('umkm_pembiayaan_histories.jabatan_id', 4)
            ->where('umkm_pembiayaan_histories.status_id', 5)
            ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
            ->get();


        $cairskpd = SkpdPembiayaan::join('skpd_pembiayaan_histories', 'skpd_pembiayaans.id', '=', 'skpd_pembiayaan_histories.skpd_pembiayaan_id')
            ->select()
            ->where('skpd_pembiayaan_histories.jabatan_id', 4)
            ->where('skpd_pembiayaan_histories.status_id', 5)
            ->whereYear('skpd_pembiayaans.tanggal_pengajuan', date('Y'))
            ->get();

        $cairppr = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select()
            ->where('ppr_pembiayaan_histories.jabatan_id', 4)
            ->where('ppr_pembiayaan_histories.status_id', 5)
            ->whereYear('form_ppr_pembiayaans.created_at', date('Y'))
            ->get();

        //Query Chart Proposal Per Bulan
        $proposalPprPerBulan = FormPprPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('id', 'ASC')
            ->get();

        $hitungPprPerBulan = $proposalPprPerBulan->values()->first();

        // //Query Chart Proposal Per Bulan
        // $proposalPprPerBulan = SkpdPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
        //     ->whereYear('created_at', date('Y'))
        //     ->groupBy(DB::raw("nama_bulan"))
        //     ->orderBy('id', 'ASC')
        //     ->get();

        // $hitungSkpdPerBulan = $proposalPprPerBulan->values()->first();

        // //Query Chart Proposal Per Bulan
        // $proposalPprPerBulan = PasarPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
        //     ->whereYear('created_at', date('Y'))
        //     ->groupBy(DB::raw("nama_bulan"))
        //     ->orderBy('id', 'ASC')
        //     ->get();

        // $hitungPasarPerBulan = $proposalPprPerBulan->values()->first();

        // //Query Chart Proposal Per Bulan
        // $proposalPprPerBulan = UmkmPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
        //     ->whereYear('created_at', date('Y'))
        //     ->groupBy(DB::raw("nama_bulan"))
        //     ->orderBy('id', 'ASC')
        //     ->get();

        // $hitungUmkmPerBulan = $proposalPprPerBulan->values()->first();

        // $bulans = $proposalPprPerBulan->values()->first();

        // $totalProposalPerBulan = $hitungPprPerBulan;

        $pasar = PasarPembiayaan::join('pasar_pembiayaan_histories', 'pasar_pembiayaans.id', '=', 'pasar_pembiayaan_histories.pasar_pembiayaan_id')
            ->select('pasar_pembiayaans.id', 'pasar_pembiayaans.created_at')
            ->where('pasar_pembiayaan_histories.status_id', 5)
            ->whereYear('pasar_pembiayaans.created_at', date('Y'))
            ->get()
            ->groupBy(function ($pasar) {
                return Carbon::parse($pasar->created_at)->format('M');
            });

        $bulans = [];
        $hitungBulanPasar = [];
        foreach ($pasar as $bulan => $values) {
            $bulans[] = $bulan;
            $hitungBulanPasar[] = count($values);
        }

        $proposalPerBulan = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(form_ppr_pembiayaans.created_at) as nama_bulan"))
            ->where('ppr_pembiayaan_histories.jabatan_id', 4)
            ->where('ppr_pembiayaan_histories.status_id', 5)
            ->whereYear('form_ppr_pembiayaans.created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('form_ppr_pembiayaans.id', 'ASC')
            ->pluck('count', 'nama_bulan');

        $hitungProposalPerBulan = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(form_ppr_pembiayaans.created_at) as nama_bulan"))
            ->where('ppr_pembiayaan_histories.jabatan_id', 4)
            ->where('ppr_pembiayaan_histories.status_id', 5)
            ->whereYear('form_ppr_pembiayaans.created_at', date('Y'))
            ->orderBy('form_ppr_pembiayaans.id', 'ASC')
            ->count();

        $bulans = $proposalPerBulan->keys();
        // $hitungPerBulan = $proposalPerBulan->values() + $proposalPasarPerBulan->values();
        // dd($hitungPerBulan);

        $proposalPasarPerBulan = PasarPembiayaan::join('pasar_pembiayaan_histories', 'pasar_pembiayaans.id', '=', 'pasar_pembiayaan_histories.pasar_pembiayaan_id')
            ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(pasar_pembiayaans.created_at) as nama_bulan"))
            ->where('pasar_pembiayaan_histories.jabatan_id', 4)
            ->where('pasar_pembiayaan_histories.status_id', 5)
            ->whereYear('pasar_pembiayaans.created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('pasar_pembiayaans.id', 'ASC')
            ->pluck('count', 'nama_bulan');

        $hitungProposalPasarPerBulan = PasarPembiayaan::join('pasar_pembiayaan_histories', 'pasar_pembiayaans.id', '=', 'pasar_pembiayaan_histories.pasar_pembiayaan_id')
            ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(pasar_pembiayaans.created_at) as nama_bulan"))
            ->where('pasar_pembiayaan_histories.jabatan_id', 4)
            ->where('pasar_pembiayaan_histories.status_id', 5)
            ->whereYear('pasar_pembiayaans.created_at', date('Y'))
            ->orderBy('pasar_pembiayaans.id', 'ASC')
            ->count();

        // $bulans = $proposalPasarPerBulan->keys();
        $hitungPasarPerBulan = $proposalPasarPerBulan->values();
        $hitungPerBulan = $proposalPerBulan->values();
        // $hitungPerBulan = $hitungProposalPerBulan + $hitungProposalPasarPerBulan;
        // dd($hitungPerBulan);
        $propPprs = PprPembiayaanHistory::select()
            ->where('status_id', 5)
            ->get();

        $jmlProposalPpr = 0;
        foreach ($propPprs as $propPpr) {
            $prop_ppr = FormPprPembiayaan::select()
                ->where('id', $propPpr->form_ppr_pembiayaan_id)
                ->get()
                ->first();
            $history = PprPembiayaanHistory::select()
                ->where('form_ppr_pembiayaan_id', $prop_ppr->id)
                ->orderBy('created_at', 'desc')
                ->get()
                ->first();

            $jmlProposalPpr++;
        }
        // dd($jmlProposalPpr);
        return view('dirbis::index', [
            'title' => 'Dasboard Direksi',
            'proposal' => $pasarproposal + $skpdproposal + $umkmproposal + $pprproposal,
            'diterima' => $pasarditerima + $skpdditerima + $umkmditerima + $pprditerima,
            'tolak' => $pasarditolak + $skpdditolak + $umkmditolak + $pprditolak,
            'review' => $pasarreview + $skpdreview + $umkmreview + $pprreview,
            'cairpasars' => $cairpasar,
            'cairumkms' => $cairumkm,
            'cairskpds' => $cairskpd,
            'cairpprs' => $cairppr,
            'totalProposal' => $hitungPerBulan,
            'jmlProposalPpr' => $jmlProposalPpr,
            'bulans' => $bulans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dirbis::create');
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
        return view('dirbis::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dirbis::edit');
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
