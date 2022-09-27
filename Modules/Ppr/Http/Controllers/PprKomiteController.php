<?php

namespace Modules\Ppr\Http\Controllers;

use App\Models\Role;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Form\Entities\FormPprDataPribadi;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Ppr\Entities\PprScoring;
use Modules\Ppr\Entities\PprScoringFixedIncome;

use function PHPUnit\Framework\assertNotNull;

class PprKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $proposal = FormPprPembiayaan::select()->where('user_id', Auth::user()->id)->whereNotNull(['dilengkapi_ao', 'form_cl', 'form_score'])->get();
        return view('ppr::komite.index', [
            'title' => 'Komite PPR',
            'proposals' => $proposal,
        ]);

        return redirect('/ppr/komite/')->with('success', 'Pengajuan Anda diteruskan ke Komite');
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
        // $data = PprScoring::select()->where('', id)->get()->first();
        // $score = $data->scoring->ppr_total_score;
        $role = Role::select()->where('user_id', Auth::user()->id)->get()->first();

        PprPembiayaanHistory::create([
            'form_ppr_pembiayaan_id' => $request->form_ppr_pembiayaan_id,
            'status_id' => $request->status_id,
            'catatan' => $request->catatan,
            'jabatan_id' => $role->jabatan_id,
            'divisi_id' => $role->divisi_id,
            'user_id' => Auth::user()->id,
        ]);

        //         if (request('revisi') == 'Ya') {
        // FormPprPembiayaan::update
        //         }
        if ($request->status_id == 3) {
            return redirect('/ppr/komite/')->with('success', 'Proposal Berhasil Diajukan!');
        } elseif ($request->status_id == 6) {
            return redirect('/ppr/komite/')->with('success', 'Proposal Berhasil Ditolak!');
        } elseif ($request->status_id == 7) {
            return redirect('/ppr/komite/')->with('success', 'Proposal Diajukan Untuk Revisi!');
        } else {
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $cek = PprPembiayaanHistory::select()
            ->where('form_ppr_pembiayaan_id', $id)
            ->where('user_id', Auth::user()->id)
            ->get()
            ->count();

        if ($cek == 0) {
            PprPembiayaanHistory::create([
                'form_ppr_pembiayaan_id' => $id,
                'status_id' => 2,
                'jabatan_id' => 1,
                'divisi_id' => 0,
                'user_id' => Auth::user()->$id,
            ]);
        }
        $pembiayaan = FormPprPembiayaan::select()->where('id', $id)->get()->first();

        //SLA & Timeline
        //Timeline
        $waktuawal = PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->orderby('created_at', 'asc')->get()->first();
        $waktuakhir = PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first();

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);


        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);

        //Perhitungan Margin, Harga Jual & Angsuran
        $hpp = $pembiayaan->form_permohonan_nilai_hpp;
        $tenor = $pembiayaan->form_permohonan_jml_bulan;
        $persenMargin = ($pembiayaan->form_permohonan_jml_margin / $hpp);
        $marginRp = $hpp * $persenMargin;
        $hargaJual = $hpp + $marginRp;
        $angsuran = $hargaJual / $tenor;
        $plafondMaks = $hpp;

        // $persenMargin = ($pembiayaan->form_permohonan_jml_margin / $plafond) * 100 / 12;
        // $margin = $pembiayaan->form_permohonan_jml_margin / 100;
        // $margin = $hpp * $persenMargin * $tenor;
        // $marginBulan = $persenMargin / 100;
        // $marginBulan = $persenMargin;
        //Angsuran
        // $angsuran = ($plafond * $marginBulan) / (1 - (1 / (1 + $marginBulan)) ** $tenor);

        //Plafond
        // $plafondMaks = ($angsuran / $marginBulan) * (1 - (1 / (1 + $marginBulan)) ** $tenor);

        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->pemohon->form_pribadi_pemohon_tanggal_lahir)->age;
        return view('ppr::komite.lihat', [
            'title' => 'Detail Proposal',
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->get()->first(),
            'pembiayaan' => FormPprPembiayaan::select()->where('id', $id)->get()->first(),
            'usiaNasabah' => $usiaNasabah,
            'scoring' => PprScoring::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'hpp' => $hpp,
            'tenor' => $tenor,
            'persenMargin' => $persenMargin,
            'marginRp' => $marginRp,
            'hargaJual' => $hargaJual,
            'angsuran' => $angsuran,
            'plafondMaks' => $plafondMaks,

            //History
            'history' => PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),
            'timelines' => PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->get(),

            //SLA
            'totalwaktu' => $totalwaktu,
            'arr' => -2,
            'banyak_history' => PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->count(),

        ]);
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
