<?php

namespace Modules\Akad\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\PasarCashPick;
use Modules\Akad\Entities\Pembiayaan;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

class ProposalAkadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $proposalpasar = PasarPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get();
        $proposalppr = PprPembiayaanHistory::select()
            // ->orderBy('created_at', 'DESC')
            ->groupBy('form_ppr_pembiayaan_id')
            ->orderBy('created_at', 'DESC')
            ->where(function ($query) {
                $query
                    ->where('status_id', 8)
                    ->where('user_id', Auth::user()->id);
            })
            ->orwhere(function ($query) {
                $query
                    ->where('status_id', 5)
                    ->where('jabatan_id', 4)
                    ->where('user_id', 7);
            })
            // ->where([['status_id', '=', 5], ['jabatan_id', '=', 4]])
            // ->orWhere([['status_id', '=', 8], ['user_id', Auth::user()->id]])


            ->get();
        $proposalskpd = SkpdPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get();
        $proposalumkm = UmkmPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get();

        // return $pasar;
        return view('akad::proposal.index', [
            'title' => 'Dashboard Proposal Akad',
            'proposalpasars' => $proposalpasar,
            'proposalskpds' => $proposalskpd,
            'proposalumkms' => $proposalumkm,
            'proposalpprs' => $proposalppr,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('akad::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $jmlPembiayaan = Pembiayaan::select()->get()->count();

        if ($jmlPembiayaan == 0) {
            $hitungId = Pembiayaan::select()->get()->count();
            $id = $hitungId + 1;
        } else {
            $hitungId = Pembiayaan::select()->orderBy('id', 'DESC')->get()->first();
            $id = $hitungId->id + 1;
        }

        $role = Role::select()->where('user_id', Auth::user()->id)->get()->first();

        if ($request->segmen == 'PPR') {
            Pembiayaan::create([
                'id' => $id,
                // Temp till get from API
                'kode_kontrak' => $id,
                'akad' => $request->akad,
                'segmen' => "PPR",
                'cif' => $request->cif,
                'kode_tabungan' => $request->kode_tabungan,
                'plafond' => $request->plafond,
                'tenor' => $request->tenor,
                'margin' => $request->margin,
                'harga_jual' => $request->harga_jual,
                'status' => $request->status,
                'catatan' => $request->catatan,
            ]);

            PprPembiayaanHistory::create([
                'form_ppr_pembiayaan_id' => $request->form_ppr_pembiayaan_id,
                'status_id' => $request->status_id,
                'jabatan_id' => $role->jabatan_id,
                'divisi_id' => $role->divisi_id,
                'catatan' => $request->catatan,
                'user_id' => Auth::user()->id,
            ]);
        } else if ($request->segmen == 'SKPD') {
            Pembiayaan::create([
                'id' => $id,
                // Temp till get from API
                'kode_kontrak' => $id,
                'akad' => $request->akad,
                'segmen' => "SKPD",
                'cif' => $request->cif,
                'kode_tabungan' => $request->kode_tabungan,
                'plafond' => $request->plafond,
                'tenor' => $request->tenor,
                'margin' => $request->margin,
                'harga_jual' => $request->harga_jual,
                'status' => $request->status,
                'catatan' => $request->catatan,
            ]);
        } else if ($request->segmen == 'Pasar') {
            Pembiayaan::create([
                'id' => $id,
                // Temp till get from API
                'kode_kontrak' => $id,
                'akad' => $request->akad,
                'segmen' => "Pasar",
                'cif' => $request->cif,
                'kode_tabungan' => $request->kode_tabungan,
                'plafond' => $request->plafond,
                'tenor' => $request->tenor,
                'margin' => $request->margin,
                'harga_jual' => $request->harga_jual,
                'status' => $request->status,
                'catatan' => $request->catatan,
            ]);
        } else if ($request->segmen == 'UMKM') {
            Pembiayaan::create([
                'id' => $id,
                // Temp till get from API
                'kode_kontrak' => $id,
                'akad' => $request->akad,
                'segmen' => "UMKM",
                'cif' => $request->cif,
                'kode_tabungan' => $request->kode_tabungan,
                'plafond' => $request->plafond,
                'tenor' => $request->tenor,
                'margin' => $request->margin,
                'harga_jual' => $request->harga_jual,
                'status' => $request->status,
                'catatan' => $request->catatan,
            ]);
        } else {
        }
        if ($request->status == 'Selesai Akad') {
            return redirect('/staff/proposal')->with('success', 'Akad Berhasil Diselesaikan!');
        } else if ($request->status == 'Akad Batal') {
            return redirect('/staff/proposal')->with('success', 'Akad Berhasil Dibatalkan!');
        } else {
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function showPpr($id)
    {

        $pembiayaan = FormPprPembiayaan::select()->where('id', $id)->get()->first();
        // //Angsuran & Plafond
        // $plafond = $pembiayaan->form_permohonan_nilai_ppr_dimohon;
        // // $margin = $pembiayaan->form_permohonan_jml_margin / 100;
        // $margin = 0.9 / 100;
        // $tenor = $pembiayaan->form_permohonan_jml_bulan;

        // //Angsuran
        // $angsuran = ($plafond * $margin) / (1 - (1 / (1 + $margin)) ** $tenor);

        // //Plafond
        // $plafondMaks = ($angsuran / $margin) * (1 - (1 / (1 + $margin)) ** $tenor);

        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->pemohon->form_pribadi_pemohon_tanggal_lahir)->age;
        return view('akad::proposal.lihat', [
            'title' => 'Proposal PPR',
            'segmen' => 'PPR',
            'pembiayaan' => FormPprPembiayaan::select()->where('id', $id)->get()->first(),
            'usiaNasabah' => $usiaNasabah,
            // 'scoring' => PprScoring::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            // 'angsuran' => $angsuran,
            // 'plafondMaks' => $plafondMaks,
        ]);
    }

    public function showPasar($id)
    {
        $pembiayaan = PasarPembiayaan::select()->where('id', $id)->get()->first();

        $data = PasarPembiayaan::select()->where('id', $id)->get()->first();

        $tenor = $data->tenor;
        $harga = $data->harga;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;
        $cash = PasarCashPick::select()->first();

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;

        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->nasabahh->tgl_lahir)->age;
        return view('akad::proposal.lihat', [
            'title' => 'Proposal Pasar',
            'segmen' => 'Pasar',
            'pembiayaan' => PasarPembiayaan::select()->where('id', $id)->get()->first(),
            'usiaNasabah' => $usiaNasabah,
            'hargaJual' => $harga_jual,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('akad::edit');
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
