<?php

namespace Modules\Akad\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Akad\Entities\Pembiayaan;

class AkadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $akadSelesai = Pembiayaan::where('status', 'Selesai Akad')->count();
        $akadBatal   = Pembiayaan::where('status', 'Akad Batal')->count();

        // Count pending-akad proposals per segment using efficient subquery (latest history per pembiayaan)
        $latestSkpd = DB::table('skpd_pembiayaan_histories')
            ->select(DB::raw('MAX(id) as id'))
            ->groupBy('skpd_pembiayaan_id');
        $proposalskpd = DB::table('skpd_pembiayaan_histories')
            ->whereIn('id', $latestSkpd)
            ->where('jabatan_id', 4)->where('status_id', 5)->where('cek_staff_akad', 'Belum')
            ->count();

        $latestPasar = DB::table('pasar_pembiayaan_histories')
            ->select(DB::raw('MAX(id) as id'))
            ->groupBy('pasar_pembiayaan_id');
        $proposalpasar = DB::table('pasar_pembiayaan_histories')
            ->whereIn('id', $latestPasar)
            ->where('jabatan_id', 4)->where('status_id', 5)->where('cek_staff_akad', 'Belum')
            ->count();

        $latestUmkm = DB::table('umkm_pembiayaan_histories')
            ->select(DB::raw('MAX(id) as id'))
            ->groupBy('umkm_pembiayaan_id');
        $proposalumkm = DB::table('umkm_pembiayaan_histories')
            ->whereIn('id', $latestUmkm)
            ->where('jabatan_id', 4)->where('status_id', 5)->where('cek_staff_akad', 'Belum')
            ->count();

        $latestPpr = DB::table('ppr_pembiayaan_histories')
            ->select(DB::raw('MAX(id) as id'))
            ->groupBy('form_ppr_pembiayaan_id');
        $proposalppr = DB::table('ppr_pembiayaan_histories')
            ->whereIn('id', $latestPpr)
            ->where('jabatan_id', 4)->where('status_id', 5)->where('cek_staff_akad', 'Belum')
            ->count();

        $latestP3k = DB::table('p3k_pembiayaan_histories')
            ->select(DB::raw('MAX(id) as id'))
            ->groupBy('p3k_pembiayaan_id');
        $proposalP3k = DB::table('p3k_pembiayaan_histories')
            ->whereIn('id', $latestP3k)
            ->where('jabatan_id', 4)->where('status_id', 5)->where('cek_staff_akad', 'Belum')
            ->count();

        return view('akad::index', [
            'title'        => 'Dashboard Staff',
            'akadSelesai'  => $akadSelesai,
            'akadBatal'    => $akadBatal,
            'user'         => User::where('id', Auth::user()->id)->first(),
            'proposalskpd' => $proposalskpd,
            'proposalpasar' => $proposalpasar,
            'proposalumkm' => $proposalumkm,
            'proposalppr'  => $proposalppr,
            'proposalP3k'  => $proposalP3k,
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
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('akad::show');
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
