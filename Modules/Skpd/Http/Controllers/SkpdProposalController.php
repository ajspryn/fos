<?php

namespace Modules\Skpd\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdSlik;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\SkpdAkad;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Admin\Entities\SkpdGolongan;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Admin\Entities\SkpdTanggungan;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Entities\SkpdJenisJaminan;
use Modules\Admin\Entities\SkpdSektorEkonomi;
use Modules\Admin\Entities\SkpdJenisPenggunaan;
use Modules\Admin\Entities\SkpdStatusPerkawinan;
use Modules\Skpd\Entities\SkpdJenisNasabah;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Skpd\Entities\SkpdSlikPasangan;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class SkpdProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $proposals = SkpdPembiayaan::query()
            ->where('user_id', Auth::user()->id)
            ->where('skpd_sektor_ekonomi_id', null)
            ->orderBy('id', 'desc')
            ->when($search, fn($q) => $q->whereHas('nasabah', fn($q2) => $q2->where('nama_nasabah', 'like', "%{$search}%")))
            ->paginate(10)->withQueryString();
        return view('skpd::proposal.index', [
            'title' => 'Proposal Calon Debitur',
            'proposals' => $proposals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('skpd::create');
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
        $datafoto = SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->get();
        $foto = $datafoto;
        return view('skpd::proposal.lihat', [
            'title' => 'Detail Proposal',
            'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->first(),
            'nasabah' => SkpdNasabah::select()->where('id', $id)->first(),
            'fotodiri' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'foto diri')->first(),
            'fotoktp' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'foto ktp')->first(),
            'fotodiribersamaktp' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'foto diri bersama ktp')->first(),
            'fotokk' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
            'fotostatus' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Akta Status Perkawinan')->first(),
            'aos' => Role::select()->where('jabatan_id', 1)->get(),
            'akads' => SkpdAkad::all(), //udah
            'golongans' => SkpdGolongan::all(), //udah
            'instansis' => SkpdInstansi::all(), //udah
            'jaminans' => SkpdJenisJaminan::all(), //udah
            'penggunaans' => SkpdJenisPenggunaan::all(), //udah
            'sektors' => SkpdSektorEkonomi::all(), //udah
            'statusperkawinans' => SkpdStatusPerkawinan::all(), //udah
            'tanggungans' => SkpdTanggungan::all(),
            'jenisNasabahs' => SkpdJenisNasabah::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('skpd::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $pembiayaan = SkpdPembiayaan::select()->where('id', $id)->first();

        SkpdPembiayaan::where('id', $id)
            ->update([
                'rate' => str_replace(",", ".", $request->rate),
                'skpd_sektor_ekonomi_id' => $request->skpd_sektor_ekonomi_id,
                'skpd_akad_id' => $request->skpd_akad_id,
                'skpd_jenis_nasabah_id' => $request->skpd_jenis_nasabah_id,
            ]);
        SkpdNasabah::where('id', $id)
            ->update([
                'alamat_domisili' => $request->alamat_domisili,
                'rt_domisili' => $request->rt_domisili,
                'rw_domisili' => $request->rw_domisili,
                'desa_kelurahan_domisili' => $request->desa_kelurahan_domisili,
                'kecamatan_domisili' => $request->kecamatan_domisili,
                'kabkota_domisili' => $request->kabkota_domisili,
                'provinsi_domisili' => $request->provinsi_domisili,
                'no_npwp' => $request->no_npwp,
            ]);


        $role = role::select()->where('user_id', Auth::user()->id)->first();
        // $dokumen_keuangan= $request->foto->store('ideb-skpd-pembiayaan');
        //  $dokumen_konfirmasi= $request->foto->store('konfirmasi-skpd-pembiayaan');
        SkpdPembiayaanHistory::create([
            'skpd_pembiayaan_id' => $id,
            'status_id' => 2,
            'jabatan_id' => $role->jabatan_id,
            'divisi_id' => $role->divisi_id,
            'user_id' => Auth::user()->id,
        ]);

        $request->validate([
            'foto.*.kategori' => 'required',
            'foto.*.foto' => 'required',
        ]);

        foreach ($request->foto as $key => $value) {
            if ($value['foto']) {
                $foto = $value['foto']->store('foto-skpd-pembiayaan', 'public');
            }
            SkpdFoto::create([
                'skpd_pembiayaan_id' => $id,
                'kategori' => $value['kategori'],
                'foto' => $foto,
            ]);
        }

        if ($request->slik[0]['nama_bank']) {

            // return $request->slik[0]['nama_bank'];
            foreach ($request->slik as $key => $value) {

                // $plafond=$value['plafond'];
                // $margin=$value['margin']/100;
                // $tenor=$value['tenor'];
                // $angsuran=$plafond*$margin*$tenor/$plafond;

                // return $value;
                SkpdSlik::create([
                    'skpd_pembiayaan_id' => $id,
                    'nama_bank' => $value['nama_bank'],
                    'plafond' => $value['plafond'],
                    'outstanding' => $value['outstanding'],
                    'tenor' => $value['tenor'],
                    'margin' => $value['margin'],
                    'angsuran' => $value['angsuran'],
                    'agunan' => $value['agunan'],
                    'kol_tertinggi' => $value['kol_tertinggi'],
                ]);
            }
        }

        if ($request->slikpasangan[0]['nama_bank']) {

            // return $request->slik[0]['nama_bank'];
            foreach ($request->slikpasangan as $key => $value) {

                // $plafond=$value['plafond'];
                // $margin=$value['margin']/100;
                // $tenor=$value['tenor'];
                // $angsuran=$plafond*$margin*$tenor/$plafond;

                // return $value;
                SkpdSlikPasangan::create([
                    'skpd_pembiayaan_id' => $id,
                    'nama_bank' => $value['nama_bank'],
                    'plafond' => $value['plafond'],
                    'outstanding' => $value['outstanding'],
                    'tenor' => $value['tenor'],
                    'margin' => $value['margin'],
                    'angsuran' => $value['angsuran'],
                    'agunan' => $value['agunan'],
                    'kol_tertinggi' => $value['kol_tertinggi'],
                ]);
            }
        }

        return redirect('/skpd/komite/' . $id)->with('success', 'Proposal Berhasil Diajukan ke Komite!');
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
