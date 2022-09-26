<?php

namespace Modules\Akad\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\PasarCashPick;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Akad\Entities\Pembiayaan;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Pasar\Entities\PasarFoto;
use Modules\Pasar\Entities\PasarJaminan;
use Modules\Pasar\Entities\PasarJaminanLain;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdJaminanLainnya;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmFoto;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmJaminanLain;
use Modules\Umkm\Entities\UmkmPembiayaan;
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
            ->where(function ($query) {
                $query
                    ->where('status_id', 5)
                    ->Where('status_id', '<', 9);
            })->where('jabatan_id', 4)->get();
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
        $jaminanlain=PasarJaminan::select()->where('pasar_pembiayaan_id',$id)->get()->first();
        return view('akad::proposal.lihat', [
            'title' => 'Proposal Pasar',
            'segmen' => 'Pasar',
            'pembiayaan' => PasarPembiayaan::select()->where('id', $id)->get()->first(),
            'usiaNasabah' => $usiaNasabah,
            'hargaJual' => $harga_jual,
            'fotodiri'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto Diri')->get()->first(),
            'fotoktp'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto KTP')->get()->first(),
            'fotodiribersamaktp'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto Diri Bersama KTP')->get()->first(),
            'fotokk'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto Kartu Keluarga')->get()->first(),
            'jaminanusahas'=>PasarJaminan::select()->where('pasar_pembiayaan_id',$id)->get(),
            'jaminanlainusahas'=>PasarJaminanLain::select()->where('pasar_pembiayaan_id',$id)->get(),
            'jaminans'=>PasarJenisJaminan::select()->where('kode_jaminan',$jaminanlain->jaminanlain)->get()->first(),
        ]);
    }
    public function showSkpd($id)
    {
        $pembiayaan = SkpdPembiayaan::select()->where('id', $id)->get()->first();

        $data = SkpdPembiayaan::select()->where('id', $id)->get()->first();

        $tenor = $data->tenor;
        $harga = $data->nominal_pembiayaan;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;

        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->nasabah->tgl_lahir)->age;
        $jaminanlain=SkpdJaminan::select()->where('skpd_pembiayaan_id',$id)->get()->first();
        return view('akad::proposal.lihat', [
            'title' => 'Proposal Skpd',
            'segmen' => 'SKPD',
            'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->get()->first(),
            'usiaNasabah' => $usiaNasabah,
            'hargaJual' => $harga_jual,
            'fotodiri'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori', 'Foto Diri')->get()->first(),
            'fotoktp'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori', 'Foto KTP')->get()->first(),
            'fotodiribersamaktp'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori', 'Foto Diri Bersama KTP')->get()->first(),
            'fotokk'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori', 'Foto Kartu Keluarga')->get()->first(),
            'jaminans' => SkpdJaminan::select()->where('skpd_pembiayaan_id', $id)->get(),
            'jaminanlainnyas' => SkpdJaminanLainnya::select()->where('skpd_pembiayaan_id', $id)->get(),
        ]);
    }
    public function showUmkm($id)
    {
        $pembiayaan = UmkmPembiayaan::select()->where('id', $id)->get()->first();

        $data = UmkmPembiayaan::select()->where('id', $id)->get()->first();

        $tenor = $data->tenor;
        $harga = $data->nominal_pembiayaan;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;
        $cash = PasarCashPick::select()->first();

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;

        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->nasabahh->tgl_lahir)->age;
        $jaminanlain=UmkmJaminan::select()->where('umkm_pembiayaan_id',$id)->get()->first();
        return view('akad::proposal.lihat', [
            'title' => 'Proposal UMKM',
            'segmen' => 'UMKM',
            'pembiayaan' => UmkmPembiayaan::select()->where('id', $id)->get()->first(),
            'usiaNasabah' => $usiaNasabah,
            'hargaJual' => $harga_jual,
            'fotodiri'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Diri')->get()->first(),
            'fotoktp'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto KTP')->get()->first(),
            'fotodiribersamaktp'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Diri Bersama KTP')->get()->first(),
            'fotokk'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Kartu Keluarga')->get()->first(),
            'jaminanusahas'=>UmkmJaminan::select()->where('umkm_pembiayaan_id',$id)->get(),
            'jaminanlainusahas'=>UmkmJaminanLain::select()->where('umkm_pembiayaan_id',$id)->get(),
            'jaminans'=>PasarJenisJaminan::select()->where('kode_jaminan',$jaminanlain->jaminanlain)->get()->first(),
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
