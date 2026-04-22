<?php

namespace Modules\UltraMikro\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\UltraMikro\Entities\UltraMikroFoto;
use Modules\UltraMikro\Entities\UltraMikroNasabah;
use Modules\UltraMikro\Entities\UltraMikroPembiayaan;
use Modules\UltraMikro\Entities\UltraMikroPetugasLapangan;
use Modules\UltraMikro\Entities\UltraMikroScoreKelompok;
use Modules\UltraMikro\Entities\UltraMikroScoreRepayment;
use Modules\UltraMikro\Entities\UltraMikroScoreTempatTinggal;

class UltraMikroRevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $proposal = UltraMikroPembiayaan::select()->where('user_id', Auth::user()->id)->whereNotNull('dokumen_ideb')
            ->when($search, fn($q) => $q->whereHas('nasabah', fn($q2) => $q2->where('nama_nasabah', 'like', "%{$search}%")))
            ->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('UltraMikro::revisi.index', [
            'title' => 'Revisi Proposal',
            'proposals' => $proposal,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('UltraMikro::create');
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
        return view('UltraMikro::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('UltraMikro::revisi.lihat', [
            'title' => 'Revisi Proposal',
            'pembiayaan' => UltraMikroPembiayaan::select()->where('id', $id)->first(),
            'nasabah' => UltraMikroNasabah::select()->where('id', $id)->first(),
            'aos' => Role::select()->where('jabatan_id', 1)->where('divisi_id', 7)->get(),
            'petugasLapangans' => UltraMikroPetugasLapangan::select()->get(),
            'statusTempatTinggals' => UltraMikroScoreTempatTinggal::select()->get(),
            'statusKelompoks' => UltraMikroScoreKelompok::select()->get(),
            'repayments' => UltraMikroScoreRepayment::select()->get(),
            'fotoKtp' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
            'fotoKartuKeluarga' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
            'fotoKtpPasangan' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto KTP Pasangan')->first(),
            'fotoRumah' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto Rumah/Tempat Tinggal')->first(),
            'fotoPekerjaan' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto Pekerjaan/Usaha')->first(),
            'fotoStatusPernikahan' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Akta Status Pernikahan/Perceraian')->first(),
        ]);
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
