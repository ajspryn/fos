<?php

namespace Modules\Skpd\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdSlik;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\SkpdAkad;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdNasabah;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Entities\SkpdGolongan;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Admin\Entities\SkpdTanggungan;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Entities\SkpdJenisJaminan;
use Modules\Skpd\Entities\SkpdOrangTerdekat;
use Modules\Admin\Entities\SkpdSektorEkonomi;
use Modules\Skpd\Entities\SkpdJaminanLainnya;
use Modules\Admin\Entities\SkpdJenisPenggunaan;
use Modules\Admin\Entities\SkpdStatusPerkawinan;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;

class SkpdRevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $proposal = SkpdPembiayaan::select()->where('user_id', Auth::user()->id)->whereNotNull('skpd_sektor_ekonomi_id')->orderBy('id', 'desc')->get();
        return view('skpd::revisi.index', [
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
        return view('skpd::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $datafoto = SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->get();
        $foto = $datafoto;
        return view('skpd::revisi.lihat', [
            'title' => 'Detail Calon Nasabah',
            'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->get()->first(),
            'nasabah' => SkpdNasabah::select()->where('id', $id)->get()->first(),
            'fotodiri' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'foto diri')->get()->first(),
            'fotoktp' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'foto ktp')->get()->first(),
            'fotodiribersamaktp' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'foto diri bersama ktp')->get()->first(),
            'fotokk' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->get()->first(),
            'fotostatus' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Akta Status Perkawinan')->get()->first(),
            'aos' => Role::select()->where('jabatan_id', 1)->get(),
            'akads' => SkpdAkad::all(), //udah
            'golongans' => SkpdGolongan::all(), //udah
            'instansis' => SkpdInstansi::all(), //udah
            'jaminans' => SkpdJenisJaminan::all(), //udah
            'penggunaans' => SkpdJenisPenggunaan::all(), //udah
            'sektors' => SkpdSektorEkonomi::all(), //udah
            'statusperkawinans' => SkpdStatusPerkawinan::all(), //udah
            'tanggungans' => SkpdTanggungan::all(),
            'idebs'=>SkpdSlik::select()->where('skpd_pembiayaan_id',$id)->get(),
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

        $sk_pengangkatan = $request->file('sk_pengangkatan')->store('skpd-sk_pengangkatan');
        $dokumen_jaminan = $request->file('dokumen_jaminan')->store('skpd-dokumen_jaminan');
        $dokumen_keuangan = $request->file('dokumen_keuangan')->store('skpd-dokumen_keuangan');
        $dokumen_slip_gaji = $request->file('dokumen_slip_gaji')->store('skpd-dokumen_slip_gaji');

        SkpdPembiayaan::where('id', $id)->update([
            'id' => $id,
            'user_id' => $request->user_id,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'nominal_pembiayaan' => str_replace(",", "", $request->nominal_pembiayaan),
            'tenor' => $request->tenor,
            'rate' => $request->rate,
            'skpd_jenis_penggunaan_id' => $request->skpd_jenis_penggunaan_id,
            'skpd_sektor_ekonomi_id' => $request->skpd_sektor_ekonomi_id,
            'skpd_akad_id' => $request->skpd_akad_id,
            'skpd_nasabah_id' => $id,
            'skpd_instansi_id' => $request->skpd_instansi_id,
            'skpd_golongan_id' => $request->skpd_golongan_id,
            'sk_pengangkatan' => $sk_pengangkatan,
            'dokumen_keuangan' => $dokumen_keuangan,
            'dokumen_slip_gaji' => $dokumen_slip_gaji,
            'gaji_pokok' => str_replace(",", "", $request->gaji_pokok),
            'pendapatan_lainnya' => str_replace(",", "", $request->pendapatan_lainnya),
            'gaji_tpp' => str_replace(",", "", $request->gaji_tpp),
            'pengeluaran_lainnya' => str_replace(",", "", $request->pengeluaran_lainnya),
            'keterangan_pengeluaran_lainnya' => $request->keterangan_pengeluaran_lainnya,
        ]);

        SkpdNasabah::where('id', $id)->update([
            'id' => $id,
            'nama_nasabah' => $request->nama_nasabah,
            'no_ktp' => $request->no_ktp,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'desa_kelurahan' => $request->desa_kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabkota' => $request->kabkota,
            'provinsi' => $request->provinsi,
            'alamat_domisili' => $request->alamat_domisili,
            'skpd_status_perkawinan_id' => $request->skpd_status_perkawinan_id,
            'skpd_tanggungan_id' => $request->skpd_tanggungan_id,
            'no_npwp' => $request->no_npwp,
            'no_telp' => str_replace("+62 0", "", $request->no_telp),
        ]);

        SkpdOrangTerdekat::where('skpd_nasabah_id', $id)->update([
            'skpd_nasabah_id' => $id,
            'nama_orang_terdekat' => $request->nama_orang_terdekat,
            'alamat_orang_terdekat' => $request->alamat_orang_terdekat,
            'rt_orang_terdekat' => $request->rt_orang_terdekat,
            'rw_orang_terdekat' => $request->rw_orang_terdekat,
            'desa_kelurahan_orang_terdekat' => $request->desa_kelurahan_orang_terdekat,
            'kecamatan_orang_terdekat' => $request->kecamatan_orang_terdekat,
            'kabkota_orang_terdekat' => $request->kabkota_orang_terdekat,
            'provinsi_orang_terdekat' => $request->provinsi_orang_terdekat,
            'no_telp_orang_terdekat' => str_replace("+62 0", "", $request->no_telp_orang_terdekat),
        ]);

        SkpdJaminan::where('skpd_pembiayaan_id', $id)->update([
            'skpd_pembiayaan_id' => $id,
            'skpd_jenis_jaminan_id' => $request->skpd_jenis_jaminan_id,
            'dokumen_jaminan' => $dokumen_jaminan,
        ]);

        SkpdPembiayaanHistory::where('skpd_pembiayaan_id', $id)->update([
            'skpd_pembiayaan_id' => $id,
            'status_id' => 2,
            'jabatan_id' => 1,
            'user_id' => null,
        ]);

        if ($request->file('dokumen_jaminan_lainnya')) {
            $dokumen_jaminan_lainnya = $request->file('dokumen_jaminan_lainnya')->store('skpd-dokumen_jaminan_lainnya');
            SkpdJaminanLainnya::where('skpd_pembiayaan_id', $id)->update([
                'skpd_pembiayaan_id' => $id,
                'nama_jaminan_lainnya' => $request->skpd_jenis_jaminan_id,
                'dokumen_jaminan_lainnya' => $dokumen_jaminan_lainnya,
            ]);
        } else {
            $dokumen_jaminan_lainnya = $request->file('dokumen_jaminan_lainnya')->store('skpd-dokumen_jaminan_lainnya');
            SkpdJaminanLainnya::where('skpd_pembiayaan_id', $id)->update([
                'skpd_pembiayaan_id' => $id,
                'nama_jaminan_lainnya' => $request->skpd_jenis_jaminan_id,
                'dokumen_jaminan_lainnya' => $dokumen_jaminan_lainnya,
            ]);
        }


        $request->validate([
            'foto.*.kategori' => 'required',
            'foto.*.foto' => 'required',
        ]);

        foreach ($request->foto as $key => $value) {
            if ($value['foto']) {
                if ($value['foto_lama']) {
                    Storage::delete($value['foto_lama']);
                }

                $foto = $value['foto']->store('foto-skpd-pembiayaan');

                SkpdFoto::where('skpd_pembiayaan_id', $id)->update([
                    'skpd_pembiayaan_id' => $id,
                    'kategori' => $value['kategori'],
                    'foto' => $foto,
                ]);
            }
        }

        if ($request->slik[0]['nama_bank']){

            SkpdSlik::select()->where('skpd_pembiayaan_id',$id)->delete();
        
            foreach ($request->slik as $key => $value) {

            SkpdSlik::create([
                'skpd_pembiayaan_id' => $id,
                'nama_bank' => $value['nama_bank'],
                'plafond' => $value['plafond'],
                'outstanding' => $value['outstanding'],
                'tenor' => $value['tenor'],
                'margin' => $value['margin'],
                'angsuran' => $value['angsuran'],
                'agunan' => $value['agunan'],
                'kol' => $value['kol'],
            ]);
        }}

        return redirect('/skpd/komite')->with('success', 'Pengajuan Anda Sedang Di Proses Silahkan Hubungi AO');
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
