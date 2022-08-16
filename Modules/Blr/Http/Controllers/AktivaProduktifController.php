<?php

namespace Modules\Blr\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blr\Entities\BlrAktivaProduktif;
use Modules\Blr\Entities\BlrJenisAktivaProduktif;
use Modules\Blr\Entities\BlrTotalAktivaProduktif;

class AktivaProduktifController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::blr.aktiva_produktif.index', [
            'title' => 'Aktiva Produktif',
            'aktiva_produktifs' => BlrAktivaProduktif::all(),
            'total_aktiva_produktifs' => BlrTotalAktivaProduktif::all(),
            'blr_jenis_aktiva_produktifs' => BlrJenisAktivaProduktif::all(),
            'total_aktiva_produktif_januari' => BlrAktivaProduktif::sum('nilai'),
            // 'total_aktiva_produktif_februari' => BlrAktivaProduktif::sum('februari'),
            // 'total_aktiva_produktif_maret' => BlrAktivaProduktif::sum('maret'),
            // 'total_aktiva_produktif_april' => BlrAktivaProduktif::sum('april'),
            // 'total_aktiva_produktif_mei' => BlrAktivaProduktif::sum('mei'),
            // 'total_aktiva_produktif_juni' => BlrAktivaProduktif::sum('juni'),
            // 'total_aktiva_produktif_juli' => BlrAktivaProduktif::sum('juli'),
            // 'total_aktiva_produktif_agustus' => BlrAktivaProduktif::sum('agustus'),
            // 'total_aktiva_produktif_september' => BlrAktivaProduktif::sum('september'),
            // 'total_aktiva_produktif_oktober' => BlrAktivaProduktif::sum('oktober'),
            // 'total_aktiva_produktif_november' => BlrAktivaProduktif::sum('november'),
            // 'total_aktiva_produktif_desember' => BlrAktivaProduktif::sum('desember'),
            // 'total_aktiva_produktif_rata_rata' => BlrAktivaProduktif::sum('rata_rata'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blr::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $hitung = BlrAktivaProduktif::select()->get()->count();
        $id = $hitung + 1;
        // BlrAktivaProduktif::create([
        //     'id' => $id,
        //     'jenis_aktiva_produktif' => request('jenis_aktiva_produktif'),
        //     'januari' => request('januari'),
        //     'februari' => request('februari'),
        //     'maret' => request('maret'),
        //     'april' => request('april'),
        //     'mei' => request('mei'),
        //     'juni' => request('juni'),
        //     'juli' => request('juli'),
        //     'agustus' => request('agustus'),
        //     'september' => request('september'),
        //     'oktober' => request('oktober'),
        //     'november' => request('november'),
        //     'desember' => request('desember'),
        //     'rata_rata' => request('rata_rata'),
        // ]);

        foreach ($request->aktiva_produktif_bulan as $value) {
            BlrAktivaProduktif::create([
                // 'id' => $id,

                'jenis_aktiva_produktif' => $value['jenis_aktiva_produktif'],
                'bulan' => $value['bulan'],
                'tahun' => $value['tahun'],
                'nilai' => $value['nilai']

            ]);
        }

        BlrTotalAktivaProduktif::create([
            'blr_aktiva_produktif_id' => $id,

            'total_aktiva_produktifs' => BlrTotalAktivaProduktif::all(),
            'total_januari' => BlrAktivaProduktif::sum('nilai'),
            // 'total_februari' => BlrAktivaProduktif::sum('februari'),
            // 'total_maret' => BlrAktivaProduktif::sum('maret'),
            // 'total_april' => BlrAktivaProduktif::sum('april'),
            // 'total_mei' => BlrAktivaProduktif::sum('mei'),
            // 'total_juni' => BlrAktivaProduktif::sum('juni'),
            // 'total_juli' => BlrAktivaProduktif::sum('juli'),
            // 'total_agustus' => BlrAktivaProduktif::sum('agustus'),
            // 'total_september' => BlrAktivaProduktif::sum('september'),
            // 'total_oktober' => BlrAktivaProduktif::sum('oktober'),
            // 'total_november' => BlrAktivaProduktif::sum('november'),
            // 'total_desember' => BlrAktivaProduktif::sum('desember'),
            // 'total_rata_rata' => BlrAktivaProduktif::sum('rata_rata'),

        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $total_aktiva_produktif_januari = BlrAktivaProduktif::select()->where('aktiva_produktif_id', $id)->sum('januari');

        return view('blr::show', [
            'title' => 'Aktiva Produktif',
            'total_aktiva_produktif_januari' => $total_aktiva_produktif_januari,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('blr::edit');
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
