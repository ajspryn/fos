<?php

namespace Modules\UltraMikro\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\UltraMikro\Entities\UltraMikroFoto;
use Modules\UltraMikro\Entities\UltraMikroPembiayaan;
use Modules\UltraMikro\Entities\UltraMikroPembiayaanHistory;

class UltraMikroCetakProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $id = Request('id');

        if (!$id) {
            return view('UltraMikro::proposal.index', [
                'title' => 'Data Proposal Ultra Mikro',
                'proposals' => UltraMikroPembiayaan::select()
                    ->where('user_id', Auth::id())
                    ->whereNotNull('dokumen_ideb')
                    ->orderBy('id', 'desc')
                    ->get(),
            ]);
        }

        $cek = UltraMikroPembiayaanHistory::select()
            ->where('ultra_mikro_pembiayaan_id', $id)
            ->where('user_id', Auth::user()->id)
            ->count();

        if ($cek == 0) {
            UltraMikroPembiayaanHistory::create([
                'ultra_mikro_pembiayaan_id' => $id,
                'status_id' => 2,
                'jabatan_id' => 1,
                'divisi_id' => 0,
                'user_id' => Auth::user()->id,
            ]);
        }

        $data = UltraMikroPembiayaan::select()->where('id', $id)->first();
        if (!$data) {
            abort(404);
        }

        //Angsuran
        $nominalPembiayaan = $data->nominal_pembiayaan;
        $tenor = $data->tenor;
        // $rate = $data->rate / 100;

        // $hargaJual = ($nominalPembiayaan * $rate * $tenor) + $nominalPembiayaan;
        $angsuran = $nominalPembiayaan / $tenor;

        //Biaya Administrasi
        // $byAdm = 1.5 / 100 * $nominalPembiayaan;

        //Pendapatan
        $penghasilan = $data->penghasilan;
        $pengeluaran = $data->pengeluaran;

        //Pendapatan bersih
        $pendapatanBersih = $penghasilan - $pengeluaran;

        //Proses Scoring
        //DSR
        $dsr = number_format((($angsuran) / $penghasilan) * 100);


        //Timeline
        $waktuAwal = UltraMikroPembiayaanHistory::select()->where('ultra_mikro_pembiayaan_id', $id)->orderby('created_at', 'asc')->first();
        $waktuAkhir = UltraMikroPembiayaanHistory::select()->where('ultra_mikro_pembiayaan_id', $id)->orderby('created_at', 'desc')->first();

        $waktuMulai = Carbon::parse($waktuAwal->created_at);
        $waktuBerakhir = Carbon::parse($waktuAkhir->created_at);

        $totalWaktu = $waktuMulai->diffAsCarbonInterval($waktuBerakhir);

        $catatanApprovals = UltraMikroPembiayaanHistory::select('ultra_mikro_pembiayaan_histories.*')
            ->where('ultra_mikro_pembiayaan_id', $id)
            ->whereIn('jabatan_id', [2, 3])
            ->where(function ($query) {
                $query->where('jabatan_id', 3)
                    ->where('status_id', 11)
                    ->orWhere(function ($query) {
                        $query->where('jabatan_id', 2)
                            ->where('status_id', 5);
                    });
            })
            ->orderBy('created_at', 'ASC')
            ->groupBy('jabatan_id')
            ->get();

        $timelines = UltraMikroPembiayaanHistory::where('ultra_mikro_pembiayaan_id', $id)->orderBy('created_at', 'asc')->get();
        $namaAO = \App\Models\User::find($timelines->where('jabatan_id', 1)->first()?->user_id)?->name ?? '-';
        $namaKabag = \App\Models\User::find($catatanApprovals->where('jabatan_id', 2)->first()?->user_id)?->name ?? '-';
        $namaAnalis = \App\Models\User::find($catatanApprovals->where('jabatan_id', 3)->first()?->user_id)?->name ?? '-';



        return view('UltraMikro::cetak', [
            'title' => 'Cetak Proposal Ultra Mikro',
            'arr' => -2,
            'banyakHistory' => UltraMikroPembiayaanHistory::select()->where('ultra_mikro_pembiayaan_id', $id)->count(),
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->first(),
            'pembiayaan' => UltraMikroPembiayaan::select()->where('id', $id)->first(),
            'timelines' => UltraMikroPembiayaanHistory::select()->where('ultra_mikro_pembiayaan_id', $id)->get(),

            'fotos' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->get(),
            // 'bonMurabahah' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Bon Murabahah')->first(),
            'fotoKtp' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
            'fotoKartuKeluarga' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
            // 'fotoNpwp' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto NPWP')->first(),
            'fotoKtpPasangan' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto KTP Pasangan')->first(),
            'fotoStatusPernikahan' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Akta Status Pernikahan/Perceraian')->first(),

            'tenor' => $tenor,
            'angsuran' => $angsuran,
            'pendapatanBersih' => $pendapatanBersih,

            //DSR
            'dsr' => $dsr,

            //History
            'history' => UltraMikroPembiayaanHistory::select()->where('ultra_mikro_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),

            //SLA
            'totalWaktu' => $totalWaktu,

            //Catatan Approval
            'catatanApprovals' => $catatanApprovals,

            //Nama Penandatangan
            'namaAO' => $namaAO,
            'namaKabag' => $namaKabag,
            'namaAnalis' => $namaAnalis,
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
        return view('UltraMikro::edit');
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
