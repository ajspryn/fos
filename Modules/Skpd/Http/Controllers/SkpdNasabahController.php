<?php

namespace Modules\Skpd\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Skpd\Entities\SkpdPembiayaan;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class SkpdNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search;
        // 'proposals'=>SkpdPembiayaan::select()->get();
        return view('skpd::nasabah.index', [
            'title' => 'Data Nasabah',
            'proposals' => SkpdNasabah::query()
                ->orderBy('nama_nasabah', 'asc')
                ->when($search, fn($q) => $q->where('nama_nasabah', 'like', "%{$search}%"))
                ->paginate(10)->withQueryString(),
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
        $data = SkpdPembiayaan::select()->where('skpd_nasabah_id', $id)->first();

        $toNumber = static function ($value): float {
            if ($value === null || $value === '') {
                return 0.0;
            }

            if (is_numeric($value)) {
                return (float) $value;
            }

            $normalized = str_replace('.', '', (string) $value);
            $normalized = str_replace(',', '.', $normalized);

            return (float) $normalized;
        };

        $toTenor = static function ($value) use ($toNumber): float {
            if ($value === null || $value === '') {
                return 0.0;
            }

            if (is_numeric($value)) {
                return (float) $value;
            }

            $digitsOnly = preg_replace('/[^0-9]/', '', (string) $value);
            if ($digitsOnly !== null && $digitsOnly !== '') {
                return (float) $digitsOnly;
            }

            return $toNumber($value);
        };

        if (!$data) {
            abort(404, 'Data pembiayaan tidak ditemukan.');
        }

        $data->nominal_pembiayaan = $toNumber($data->nominal_pembiayaan);

        $nasabah = SkpdNasabah::select()->where('id', $id)->first();

        $tenor = $toTenor($data->tenor);
        $harga = $data->nominal_pembiayaan;
        $rate = $toNumber($data->rate);
        $margin = ($rate * $tenor) / 100;

        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;

        $angsuran1 = $tenor > 0 ? (int)($harga_jual / $tenor) : 0;
        $jaminanlain = SkpdJaminan::select()->where('skpd_pembiayaan_id', $data->id)->first();
        return view('skpd::nasabah.lihat', [
            'title' => 'Nasabah',
            'pembiayaan' => $data,
            'nasabah' => $nasabah,
            'datas' => SkpdPembiayaan::select()->where('skpd_nasabah_id', $id)->get(),
            'historys' => SkpdPembiayaan::select()->where('skpd_nasabah_id', $id)->get(),
            'fotodiri' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->first(),
            'angsuran' => $angsuran1,
            'jaminans' => $jaminanlain ? $jaminanlain->jenis_jaminan : null,
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
