<?php

namespace Modules\Akad\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Akad\Entities\AkadAsuransi;
use Modules\Akad\Entities\AkadJaminan;
use Modules\Akad\Entities\AkadPenjamin;
use Modules\Akad\Entities\RegisterAkad;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;

class RegisterAkadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return redirect('/staff/proposal');
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

        //Id register akad
        $jmlRegisterAkad = RegisterAkad::select()->count();

        if ($jmlRegisterAkad == 0) {
            $hitungId = RegisterAkad::select()->count();
            $idRegisterAkad = $hitungId + 1;
        } else {
            $hitungId = RegisterAkad::select()->latest()->first();
            $idRegisterAkad = $hitungId->id + 1;
        }

        //Segmen
        $segmen = $request->segmen;
        $role = Role::select()->where('user_id', Auth::user()->id)->first();

        // $tglAkad = $request->tgl_akad;

        //Konversi tanggal untuk diinput ke db
        $tglAkad = Carbon::createFromFormat('d-m-Y', $request->tgl_akad)->format('Y-m-d');
        $tglPencairan = Carbon::createFromFormat('d-m-Y', $request->tgl_pencairan)->format('Y-m-d');
        $tglAngsuranAwal = Carbon::createFromFormat('d-m-Y', $request->tgl_angsuran_awal)->format('Y-m-d');
        $tglJatuhTempo = Carbon::createFromFormat('d-m-Y', $request->tgl_jatuh_tempo)->format('Y-m-d');
        $tglTerbitJaminan1 = Carbon::createFromFormat('d-m-Y', $request->tgl_terbit_jaminan1)->format('Y-m-d');
        $masaBerlakuJaminan1 = Carbon::createFromFormat('d-m-Y', $request->masa_berlaku_jaminan1)->format('Y-m-d');

        //Jika ada jaminan 2
        if ($request->tgl_terbit_jaminan2 != NULL && $request->masa_berlaku_jaminan2) {
            $tglTerbitJaminan2 = Carbon::createFromFormat('d-m-Y', $request->tgl_terbit_jaminan2)->format('Y-m-d');
            $masaBerlakuJaminan2 = Carbon::createFromFormat('d-m-Y', $request->masa_berlaku_jaminan2)->format('Y-m-d');
        } else {
            $tglTerbitJaminan2 = NULL;
            $masaBerlakuJaminan2 = NULL;
        }

        if ($segmen === 'SKPD') {
        } elseif ($segmen === 'Pasar') {
        } elseif ($segmen === 'UMKM') {
        } elseif ($segmen === 'PPR') {
        } elseif ($segmen === 'P3K') {

            $id = $request->p3k_pembiayaan_id;
            $pembiayaan = P3kPembiayaan::select()->where('id', $id)->first();

            //Store file dengan nama asli
            $lembarJadang = $request->file('lembar_jadang');
            $lembarJadangName = time() . '_' . $lembarJadang->getClientOriginalName();
            $request->file('lembar_jadang')->storeAs('lembar-jadang', $lembarJadangName);
            $filePathLembarJadang = 'lembar-jadang/' . $lembarJadangName;

            RegisterAkad::create([
                'id' => $idRegisterAkad,
                'no_akad' => $request->no_akad,
                'no_rek_tabungan' => $request->no_rek_tabungan,
                'kd_kontrak' => $request->kd_kontrak,
                'segmen' => $request->segmen,
                'akad' => $pembiayaan->akad,
                'id_pembiayaan' => $request->p3k_pembiayaan_id,
                'inisial_produk' => $request->inisial_produk,
                'kd_produk' => $request->kd_produk,
                'jenis_produk' => $request->jenis_produk,
                'tgl_akad' => $tglAkad,
                'tgl_pencairan' => $tglPencairan,
                'tgl_angsuran_awal' => $tglAngsuranAwal,
                'tgl_jatuh_tempo' => $tglJatuhTempo,
                'plafond' => str_replace(".", "", $request->plafond),
                'tenor' => $request->tenor,
                'persentase_margin' => $request->persentase_margin,
                'margin' => str_replace(".", "", $request->margin),
                'harga_jual' => str_replace(".", "", $request->harga_jual),
                'harga_jual_terbilang' => $request->harga_jual_terbilang,
                'angsuran' => str_replace(".", "", $request->angsuran),
                'denda_per_hari' => str_replace(".", "", $request->denda_per_hari),
                'by_adm' => str_replace(".", "", $request->by_adm),
                'by_notaris' => str_replace(".", "", $request->by_notaris),
                'by_adm_tab' => str_replace(".", "", $request->by_adm_tab),
                'by_materai' => str_replace(".", "", $request->by_materai),
                'by_sp3' => str_replace(".", "", $request->by_sp3),
                'hold_angsuran' => $request->hold_angsuran,
                'angsuran_npp' => str_replace(".", "", $request->angsuran_npp),
                'by_npp' => str_replace(".", "", $request->by_npp),
                'pencairan_nasabah_npp' => str_replace(".", "", $request->pencairan_nasabah_npp),
                'saksi_ao' => $request->saksi_ao,
                'saksi_legal' => $request->saksi_legal,
                'pola_pembayaran' => $request->pola_pembayaran,
                'pola_angsuran' => $request->pola_angsuran,
                'id_jaminan' => $idRegisterAkad,
                'id_asuransi' => $idRegisterAkad,
                'lembar_jadang' => $filePathLembarJadang,
            ]);

            AkadJaminan::create([
                'id' => $idRegisterAkad,
                'nama_jaminan1' => $request->nama_jaminan1,
                'no_jaminan1' => $request->no_jaminan1,
                'luas_tanah_jaminan1' => $request->luas_tanah_jaminan1,
                'tgl_terbit_jaminan1' => $tglTerbitJaminan1,
                'penerbit_jaminan1' => $request->penerbit_jaminan1,
                'masa_berlaku_jaminan1' => $masaBerlakuJaminan1,
                'atas_nama_jaminan1' => $request->atas_nama_jaminan1,
                'hub_nama_jaminan1' => $request->hub_nama_jaminan1,
                'alamat_jaminan1' => $request->alamat_jaminan1,
                'rt_jaminan1' => $request->rt_jaminan1,
                'rw_jaminan1' => $request->rw_jaminan1,
                'kel_jaminan1' => $request->kel_jaminan1,
                'kec_jaminan1' => $request->kec_jaminan1,
                'kabkota_jaminan1' => $request->kabkota_jaminan1,

                'nama_jaminan2' => $request->nama_jaminan2,
                'no_jaminan2' => $request->no_jaminan2,
                'luas_tanah_jaminan2' => $request->luas_tanah_jaminan2,
                'tgl_terbit_jaminan2' => $tglTerbitJaminan2,
                'penerbit_jaminan2' => $request->penerbit_jaminan2,
                'masa_berlaku_jaminan2' => $masaBerlakuJaminan2,
                'atas_nama_jaminan2' => $request->atas_nama_jaminan2,
                'hub_nama_jaminan2' => $request->hub_nama_jaminan2,
                'alamat_jaminan2' => $request->alamat_jaminan2,
                'rt_jaminan2' => $request->rt_jaminan2,
                'rw_jaminan2' => $request->rw_jaminan2,
                'kel_jaminan2' => $request->kel_jaminan2,
                'kec_jaminan2' => $request->kec_jaminan2,
                'kabkota_jaminan2' => $request->kabkota_jaminan2,

                'merk_kendaraan' => $request->merk_kendaraan,
                'tipe_kendaraan' => $request->tipe_kendaraan,
                'warna' => $request->warna,
                'tahun_dibuat' => $request->tahun_dibuat,
                'no_mesin' => $request->no_mesin,
                'no_rangka' => $request->no_rangka,
                'no_polisi' => $request->no_polisi,
            ]);

            //Jika nasabah menikah
            if ($pembiayaan->nasabah->status_pernikahan == "Menikah") {
                AkadPenjamin::create([
                    'id' => $idRegisterAkad,
                    'nama_penjamin' => $pembiayaan->nasabah->nama_nasabah,
                    'nama_instansi' => $pembiayaan->nasabah->pekerjaan->nama_unit_kerja,
                    'departemen_jabatan' => $pembiayaan->nasabah->pekerjaan->jabatan,
                    'nik_penjamin' => $pembiayaan->nasabah->no_ktp,
                    'alamat_penjamin' => $pembiayaan->nasabah->alamat,
                    'rt_penjamin' => $pembiayaan->nasabah->rt,
                    'rw_penjamin' => $pembiayaan->nasabah->rw,
                    'kel_penjamin' => $pembiayaan->nasabah->desa_kelurahan,
                    'kec_penjamin' => $pembiayaan->nasabah->kecamatan,
                    'kabkota_penjamin' => $pembiayaan->nasabah->kabkota,

                    'nama_pasangan_penjamin' => $pembiayaan->nasabah->nama_pasangan_nasabah,
                    'nik_pasangan_penjamin' => $pembiayaan->nasabah->no_ktp_pasangan,
                    'alamat_pasangan_penjamin' => $pembiayaan->nasabah->alamat,
                    'rt_pasangan_penjamin' => $pembiayaan->nasabah->rt,
                    'rw_pasangan_penjamin' => $pembiayaan->nasabah->rw,
                    'kel_pasangan_penjamin' => $pembiayaan->nasabah->desa_kelurahan,
                    'kec_pasangan_penjamin' => $pembiayaan->nasabah->kecamatan,
                    'kabkota_pasangan_penjamin' => $pembiayaan->nasabah->kabkota,
                ]);
            } else { //Jika tidak
                AkadPenjamin::create([
                    'id' => $idRegisterAkad,
                    'nama_penjamin' => $pembiayaan->nasabah->nama_nasabah,
                    'nama_instansi' => $pembiayaan->nasabah->pekerjaan->nama_unit_kerja,
                    'departemen_jabatan' => $pembiayaan->nasabah->pekerjaan->jabatan,
                    'nik_penjamin' => $pembiayaan->nasabah->no_ktp,
                    'alamat_penjamin' => $pembiayaan->nasabah->alamat,
                    'rt_penjamin' => $pembiayaan->nasabah->rt,
                    'rw_penjamin' => $pembiayaan->nasabah->rw,
                    'kel_penjamin' => $pembiayaan->nasabah->desa_kelurahan,
                    'kec_penjamin' => $pembiayaan->nasabah->kecamatan,
                    'kabkota_penjamin' => $pembiayaan->nasabah->kabkota,
                ]);
            }


            AkadAsuransi::create([
                'id' => $idRegisterAkad,
                'nama_asuransi' => $request->nama_asuransi,
                'biaya_asuransi_jiwa' => str_replace(".", "", $request->biaya_asuransi_jiwa),
                'biaya_asuransi_kendaraan' => str_replace(".", "", $request->biaya_asuransi_kendaraan),
                'biaya_asuransi_kebakaran' => str_replace(".", "", $request->biaya_asuransi_kebakaran),
            ]);

            P3kPembiayaanHistory::where('p3k_pembiayaan_id', $request->p3k_pembiayaan_id)
                ->where('status_id', 5)
                ->where('jabatan_id', 4)
                ->latest()
                ->first()
                ->update([
                    'cek_staff_akad' => $request->cek_staff_akad,
                ]);

            P3kPembiayaanHistory::create([
                'p3k_pembiayaan_id' => $request->p3k_pembiayaan_id,
                'status_id' => $request->status_id,
                'jabatan_id' => $role->jabatan_id,
                'divisi_id' => $role->divisi_id,
                'catatan' => $request->catatan,
                'user_id' => Auth::user()->id,
                'cek_staff_akad' => $request->cek_staff_akad,
                'reg_akad' => $request->reg_akad,
            ]);

            return redirect('/staff/proposal/p3k/' . $id)->with('success', 'Register Akad Berhasil!');
        }

        return back()->with('error', 'Segmen tidak valid.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($category, $id)
    {
        if ($category === 'skpd') {
        } elseif ($category === 'pasar') {
        } elseif ($category === 'umkm') {
        } elseif ($category === 'ppr') {
        } elseif ($category === 'p3k') {
            return view('akad::proposal.lihat', [
                'segmen' => 'P3K',
                'title' => 'Detail Proposal',
                'arr' => -2,
            ]);
        } else {
        }
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
