<?php

namespace Modules\P3k\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\P3k\Entities\P3kFoto;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;

class P3kCetakProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $id = Request('id');
        if (!$id) abort(404);
        $cek = P3kPembiayaanHistory::select()
            ->where('p3k_pembiayaan_id', $id)
            ->where('user_id', Auth::user()->id)
            ->count();

        if ($cek == 0) {
            P3kPembiayaanHistory::create([
                'p3k_pembiayaan_id' => $id,
                'status_id' => 2,
                'jabatan_id' => 1,
                'divisi_id' => 0,
                'user_id' => Auth::user()->id,
            ]);
        }

        $data = P3kPembiayaan::select()->where('id', $id)->first();

        //Angsuran
        $nominalPembiayaan = (float)($data->nominal_pembiayaan ?? 0);
        $tenor = (float)($data->tenor ?? 0);
        $rate = (float)($data->rate ?? 0) / 100;

        $hargaJual = ($nominalPembiayaan * $rate * $tenor) + $nominalPembiayaan;
        $angsuran = $tenor > 0 ? $hargaJual / $tenor : 0;
        $totalAngsuranBtbFasAktif = (float)($data->total_angsuran_btb_fas_aktif ?? 0);

        //Biaya Administrasi
        $byAdm = 1.5 / 100 * $nominalPembiayaan;

        //Pendapatan
        $gajiPokok = (float)($data->gaji_pokok ?? 0);
        $gajiTpp = (float)($data->gaji_tpp ?? 0);
        $gajiPasangan = (float)($data->gaji_pasangan ?? 0);
        $totalPendapatan = $gajiPokok + $gajiTpp;
        $totalPendapatanJoinIncome = $gajiPokok + $gajiTpp + $gajiPasangan;

        //Pengeluaran
        $pengeluaranLainnya = (float)($data->pengeluaran_lainnya ?? 0);

        //Pendapatan bersih
        $pendapatanBersih = $totalPendapatan - $totalAngsuranBtbFasAktif - $pengeluaranLainnya;
        $pendapatanBersihJoinIncome = $totalPendapatanJoinIncome - $totalAngsuranBtbFasAktif - $pengeluaranLainnya;

        //Proses Scoring
        //DSR
        $dsr = $totalPendapatan > 0
            ? (int)number_format((($angsuran + $totalAngsuranBtbFasAktif) / $totalPendapatan) * 100)
            : 0;
        //DSR Join Income
        $dsrJoinIncome = $totalPendapatanJoinIncome > 0
            ? (int)number_format((($angsuran + $totalAngsuranBtbFasAktif) / $totalPendapatanJoinIncome) * 100)
            : 0;


        $timelines = P3kPembiayaanHistory::where('p3k_pembiayaan_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();

        $banyakHistory = $timelines->count();
        $history = $timelines->last();

        if ($timelines->isNotEmpty()) {
            $waktuMulai = Carbon::parse($timelines->first()->created_at);
            $waktuBerakhir = Carbon::parse($timelines->last()->created_at);
            $totalWaktu = $waktuMulai->diffAsCarbonInterval($waktuBerakhir);
        } else {
            $totalWaktu = null;
        }

        $catatanApprovals = P3kPembiayaanHistory::select('p3k_pembiayaan_histories.*')
            ->where('p3k_pembiayaan_id', $id)
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

        $namaAO = \App\Models\User::find($timelines->where('jabatan_id', 1)->first()?->user_id)?->name ?? '-';
        $namaKabag = \App\Models\User::find($catatanApprovals->where('jabatan_id', 2)->first()?->user_id)?->name ?? '-';
        $namaAnalis = \App\Models\User::find($catatanApprovals->where('jabatan_id', 3)->first()?->user_id)?->name ?? '-';



        $umur = Carbon::parse($data->nasabah->tgl_lahir)->age;

        $fotosAll = P3kFoto::where('p3k_pembiayaan_id', $id)->get();

        return view('p3k::cetak', [
            'title' => 'Cetak Proposal P3K',
            'arr' => -2,
            'banyakHistory' => $banyakHistory,
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->first(),
            'pembiayaan' => $data,
            'timelines' => $timelines,

            'fotos' => $fotosAll,
            'bonMurabahah' => $fotosAll->firstWhere('kategori', 'Bon Murabahah'),
            'fotoKtp' => $fotosAll->firstWhere('kategori', 'Foto KTP'),
            'fotoKartuKeluarga' => $fotosAll->firstWhere('kategori', 'Foto Kartu Keluarga'),
            'fotoNpwp' => $fotosAll->firstWhere('kategori', 'Foto NPWP'),
            'fotoKtpPasangan' => $fotosAll->firstWhere('kategori', 'Foto KTP Pasangan'),
            'fotoStatusPernikahan' => $fotosAll->firstWhere('kategori', 'Akta Status Pernikahan/Perceraian'),

            'idebPasangan' => $fotosAll->firstWhere('kategori', 'IDEB Pasangan'),

            'hargaJual' => $hargaJual,
            'tenor' => $tenor,
            'rate' => $rate,
            'angsuran' => $angsuran,
            'pendapatanBersih' => $pendapatanBersih,
            'pendapatanBersihJoinIncome' => $pendapatanBersihJoinIncome,
            'byAdm' => $byAdm,

            //DSR
            'dsr' => $dsr,
            'dsrJoinIncome' => $dsrJoinIncome,

            //History
            'history' => $history,

            //SLA
            'totalWaktu' => $totalWaktu,

            'umur' => $umur,

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
        return view('p3k::show');
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
