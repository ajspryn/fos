<?php

namespace Modules\P3k\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\P3k\Entities\P3kFoto;
use Modules\P3k\Entities\P3kNasabah;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;
use Modules\P3k\Entities\P3kSlik;
use Modules\P3k\Entities\P3kSlikPasangan;

class P3kProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = P3kPembiayaan::with(['nasabah'])
            ->where('user_id', Auth::user()->id)
            ->whereNull('dokumen_ideb')
            ->when($search, function ($q) use ($search) {
                $q->whereHas('nasabah', function ($q2) use ($search) {
                    $q2->where('nama_nasabah', 'like', "%{$search}%")
                        ->orWhere('no_ktp', 'like', "%{$search}%");
                });
            })
            ->orderBy('id', 'desc');

        return view('p3k::proposal.index', [
            'title' => 'Proposal Calon Nasabah',
            'proposals' => $query->paginate(25)->appends($request->only('search')),
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('p3k::create');
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
        // Fetch pembiayaan and nasabah once, and fetch all fotos in one query to avoid multiple DB hits
        $pembiayaan = P3kPembiayaan::select()->where('id', $id)->first();
        $nasabah = P3kNasabah::select()->where('id', $id)->first();
        $aos = Role::select()->where('jabatan_id', 1)->where('divisi_id', 6)->get();

        $fotos = P3kFoto::select()->where('p3k_pembiayaan_id', $id)->get();

        return view('p3k::proposal.lihat', [
            'title' => 'Detail Proposal',
            'pembiayaan' => $pembiayaan,
            'nasabah' => $nasabah,
            'aos' => $aos,
            'fotoKtp' => $fotos->firstWhere('kategori', 'Foto KTP'),
            'fotoKartuKeluarga' => $fotos->firstWhere('kategori', 'Foto Kartu Keluarga'),
            'fotoNpwp' => $fotos->firstWhere('kategori', 'Foto NPWP'),
            'fotoKtpPasangan' => $fotos->firstWhere('kategori', 'Foto KTP Pasangan'),
            'idebPasangan' => $fotos->firstWhere('kategori', 'IDEB Pasangan'),
            'fotoStatusPernikahan' => $fotos->firstWhere('kategori', 'Akta Status Pernikahan/Perceraian'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('p3k::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $pembiayaan = P3kPembiayaan::where('id', $id)->first();

        //Store file IDEB dengan nama asli
        $dokumenIdeb = $request->file('dokumen_ideb');
        $dokumenIdebName = time() . '_' . $dokumenIdeb->getClientOriginalName();
        $request->file('dokumen_ideb')->storeAs('p3k-dokumen-ideb', $dokumenIdebName, 'public');
        $filePathDokumenIdeb = 'p3k-dokumen-ideb/' . $dokumenIdebName;

        //If Menikah
        if ($pembiayaan->nasabah->status_pernikahan == "Menikah") {
            //Upload IDEB pasangan
            //Store array foto
            foreach ($request->foto as $key => $value) {
                if ($value['foto']) {
                    $fileName = time() . '_' . $value['foto']->getClientOriginalName();

                    $foto = $value['foto']->storeAs('foto-p3k-pembiayaan', $fileName, 'public');
                }

                P3kFoto::create([
                    'p3k_pembiayaan_id' => $id,
                    'kategori' => $value['kategori'],
                    'foto' => $foto,
                ]);
            }
        }

        P3kPembiayaan::where('id', $id)
            ->update([
                'dokumen_ideb' => $filePathDokumenIdeb,
            ]);

        $role = role::select()->where('user_id', Auth::user()->id)->first();
        P3kPembiayaanHistory::create([
            'p3k_pembiayaan_id' => $id,
            'status_id' => 2,
            'jabatan_id' => $role->jabatan_id,
            'divisi_id' => $role->divisi_id,
            'user_id' => Auth::user()->id,
        ]);

        // if ($request->ideb[0]['nama_bank']) {
        //     foreach ($request->ideb as $key => $value) {
        //         P3kSlik::create([
        //             'p3k_pembiayaan_id' => $id,
        //             'nama_bank' => $value['nama_bank'],
        //             'plafond' => $value['plafond'],
        //             'outstanding' => $value['outstanding'],
        //             'tenor' => $value['tenor'],
        //             'margin' => $value['margin'],
        //             'angsuran' => $value['angsuran'],
        //             'agunan' => $value['agunan'],
        //             'kol_tertinggi' => $value['kol_tertinggi'],
        //         ]);
        //     }
        // }

        // if ($pembiayaan->nasabah->status_pernikahan == "Menikah") {
        //     if ($request->ideb_pasangan[0]['nama_bank']) {
        //         foreach ($request->ideb_pasangan as $key => $value) {
        //             P3kSlikPasangan::create([
        //                 'p3k_pembiayaan_id' => $id,
        //                 'nama_bank' => $value['nama_bank'],
        //                 'plafond' => $value['plafond'],
        //                 'outstanding' => $value['outstanding'],
        //                 'tenor' => $value['tenor'],
        //                 'margin' => $value['margin'],
        //                 'angsuran' => $value['angsuran'],
        //                 'agunan' => $value['agunan'],
        //                 'kol_tertinggi' => $value['kol_tertinggi'],
        //             ]);
        //         }
        //     }
        // }

        return redirect('/p3k/komite/' . $id)->with('success', 'Proposal Berhasil Diajukan ke Komite!');
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
