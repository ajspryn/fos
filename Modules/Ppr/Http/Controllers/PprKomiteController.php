<?php

namespace Modules\Ppr\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
        $proposal = FormPprPembiayaan::select()->where('user_id', Auth::user()->id)->whereNotNull(['form_cl', 'form_score'])->get();
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
        $role = Role::select()->where('user_id', Auth::user()->id)->get()->first();

        PprPembiayaanHistory::create([
            'form_ppr_pembiayaan_id' => $request->form_ppr_pembiayaan_id,
            'status_id' => 3,
            'catatan' => $request->catatan,
            'jabatan_id' => $role->jabatan_id,
            'divisi_id' => $role->divisi_id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/ppr/komite/')->with('success', 'Proposal Anda Berhasil Diajukan');

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
        return view('ppr::komite.lihat', [
            'title' => 'Detail Proposal',
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->get()->first(),
            'pembiayaan' => FormPprPembiayaan::select()->where('id', $id)->get()->first(),
            'scoring' => PprScoring::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'timelines' => PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->get(),

            //History
            'history' => PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),

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
