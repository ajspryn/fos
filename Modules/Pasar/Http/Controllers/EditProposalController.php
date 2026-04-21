<?php

namespace Modules\Pasar\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Entities\PasarAkad;
use Modules\Admin\Entities\PasarCashPick;
use Modules\Admin\Entities\PasarJaminanRumahh;
use Modules\Admin\Entities\PasarJenisDagang;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Admin\Entities\PasarJenisNasabah;
use Modules\Admin\Entities\PasarJenisPasar;
use Modules\Admin\Entities\PasarLamaBerdagang;
use Modules\Admin\Entities\PasarPenggunaan;
use Modules\Admin\Entities\PasarSektorEkonomi;
use Modules\Admin\Entities\PasarStatusPerkawinan;
use Modules\Admin\Entities\PasarSukuBangsa;
use Modules\Admin\Entities\PasarTanggungan;
use Modules\Pasar\Entities\PasarDokumen;
use Modules\Pasar\Entities\PasarFoto;
use Modules\Pasar\Entities\PasarJaminan;
use Modules\Pasar\Entities\PasarJaminanLain;
use Modules\Pasar\Entities\PasarKeteranganUsaha;
use Modules\Pasar\Entities\PasarLegalitasRumah;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Pasar\Entities\PasarSlik;
use Modules\Pasar\Entities\PasarSlikPasangan;

class EditProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $userId = Auth::id();

        $latestSub = DB::table('pasar_pembiayaan_histories')
            ->select('pasar_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
            ->groupBy('pasar_pembiayaan_id');

        $histories = DB::query()
            ->fromSub($latestSub, 'pl')
            ->join('pasar_pembiayaan_histories as ph', 'ph.id', '=', 'pl.latest_id')
            ->join('pasar_pembiayaans as p', 'p.id', '=', 'pl.pasar_pembiayaan_id')
            ->where('p.AO_id', $userId)
            ->whereNotNull('p.sektor_id')
            ->where('ph.status_id', 7)
            ->get()
            ->keyBy('pasar_pembiayaan_id');

        $komiteIds = $histories->keys()->all();

        $komite = PasarPembiayaan::with(['nasabahh', 'keteranganusaha.jenispasar', 'user'])
            ->whereIn('id', $komiteIds)
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('pasar::revisi.index', [
            'title' => 'Data  Revisi Proposal Nasabah',
            'komites' => $komite,
            'histories' => $histories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('pasar::create');
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
        return view('pasar::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $datafoto = PasarFoto::select()->where('pasar_pembiayaan_id', $id)->get();
        $foto = $datafoto;
        $data = PasarPembiayaan::select()->where('id', $id)->first();

        // return $data;
        return view('pasar::revisi.lihat', [
            'title' => 'Detail Calon Nasabah',
            'pembiayaan' => PasarPembiayaan::select()->where('id', $id)->first(),
            'nasabah' => PasarNasabahh::select()->where('id', $id)->first(),
            'fotodiri' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->first(),
            'fotoktp' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
            'fotodiribersamaktp' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Diri Bersama KTP')->first(),
            'fotokk' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
            'fototoko' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto toko')->first(),
            'usahas' => PasarKeteranganUsaha::all(), //udah
            'jaminanutama' => PasarJaminan::select()->where('pasar_pembiayaan_id', $id)->first(), //udah
            'jaminanlain' => PasarJaminanLain::select()->where('pasar_pembiayaan_id', $id)->first(), //udah
            'akads' => PasarAkad::all(),
            'sektors' => PasarSektorEkonomi::all(),
            'pasars' => PasarJenisPasar::all(),
            'lamas' => PasarLamaBerdagang::all(),
            'rumahs' => PasarJaminanRumahh::all(),
            'dagangs' => PasarJenisDagang::all(),
            'aos' => Role::select()->where('jabatan_id', 1)->get(),
            'cashs' => PasarCashPick::all(),
            'jaminans' => PasarJenisJaminan::all(),
            'nasabahs' => PasarJenisNasabah::all(),
            'sukus' => PasarSukuBangsa::all(),
            'akads' => PasarAkad::all(),
            'penggunaans' => PasarPenggunaan::all(),
            'sektors' => PasarSektorEkonomi::all(),
            'pasars' => PasarJenisPasar::all(),
            'lamas' => PasarLamaBerdagang::all(),
            'rumahs' => PasarJaminanRumahh::all(),
            'dagangs' => PasarJenisDagang::all(),
            'aos' => Role::select()->where('jabatan_id', 1)->get(),
            'tanggungans' => PasarTanggungan::all(),
            'statuss' => PasarStatusPerkawinan::all(),
            'jaminans' => PasarJenisJaminan::all(),
            'idebs' => PasarSlik::select()->where('pasar_pembiayaan_id', $id)->get(),
            'idebpasangans' => PasarSlikPasangan::select()->where('pasar_pembiayaan_id', $id)->get(),
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

        //Konversi tgl untuk diinput ke db
        $tglPembiayaan = Carbon::createFromFormat('d-m-Y', $request->tgl_pembiayaan)->format('Y-m-d');
        $tglLahir = Carbon::createFromFormat('d-m-Y', $request->tgl_lahir)->format('Y-m-d');

        // return $request;
        $data = PasarPembiayaan::select()->where('id', $id)->first();
        PasarPembiayaan::where('id', $id)->update([
            'id' => $id,
            'tgl_pembiayaan' => $tglPembiayaan,
            'AO_id' => $request->AO_id,
            'penggunaan_id' => $request->penggunaan_id,
            'pesanan_blok' => $request->pesanan_blok,
            'tenor' => $request->tenor,
            'luas' => $request->luas,
            'harga' => str_replace(".", "", $request->harga),
            'jaminan_id' => $id,
            'jaminanlain_id' => $id,
            'pasar_legalitas_rumah_id' => $id,
            'pasar_keterangan_usaha_id' => $id,
            'omset' => str_replace(".", "", $request->omset),
            'hpp' => str_replace(".", "", $request->hpp),
            'listrik' => str_replace(".", "", $request->listrik),
            'trasport' => str_replace(".", "", $request->trasport),
            'karyawan' => str_replace(".", "", $request->karyawan),
            'telpon' => str_replace(".", "", $request->telpon),
            'sewa' => str_replace(".", "", $request->sewa),
            'slik_id' => $id,
            'keb_keluarga' => str_replace(".", "", $request->keb_keluarga),
            'kesanggupan_angsuran' => str_replace(".", "", $request->kesanggupan_angsuran),
            'keterangan_keb_keluarga' => $request->keterangan_keb_keluarga,
            'aset' => $request->aset,
        ]);

        if ($request->file('dokumen_keuangan')) {
            if ($request->dokumen_keuangan_lama) {
                Storage::delete($request->dokumen_keuangan_lama);
            }
            $dokumen_keuangan = $request->file('dokumen_keuangan')->store('pasar-dokumen-keuangan');
            PasarPembiayaan::where('id', $id)->update([
                'dokumen_keuangan' => $dokumen_keuangan,
            ]);
        } else {
        }

        PasarNasabahh::where('id', $data->nasabah_id)->update([
            'nama_nasabah' => $request->nama_nasabah,
            'no_ktp' => $request->no_ktp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $tglLahir,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'desa_kelurahan' => $request->desa_kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabkota' => $request->kabkota,
            'provinsi' => $request->provinsi,
            'alamat_domisili' => $request->provinsi,
            'lama_tinggal' => $request->lama_tinggal,
            'nama_pasangan' => $request->nama_pasangan,
            'nama_ibu' => $request->nama_ibu,
            'agama_id' => $request->agama_id,
            'status_id' => $request->status_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
            'jumlah_anak' => $request->jumlah_anak,
            'npwp' => $request->npwp,
            'no_tlp' => str_replace("+62 0", "", $request->no_tlp),
            'namaot' => $request->namaot,
            'alamat_ot' => $request->alamat_ot,
            'telp_ot' => str_replace("+62 0", "", $request->telp_ot),
            'foto_id' => $id,
        ]);


        PasarJaminan::where('pasar_pembiayaan_id', $id)->update([
            'pasar_pembiayaan_id' => $id,
            'no_ktb' => $request->no_ktb,
            'jaminanlain' => $request->jaminanlain,
        ]);

        if ($request->file('dokumenktb')) {
            if ($request->dokumenlama) {
                Storage::delete($request->dokumenlama);
            }
            $dokumenktb = $request->file('dokumenktb')->store('pasar-dokumen-ktb');

            PasarJaminan::where('pasar_pembiayaan_id', $id)->update([
                'dokumenktb' => $dokumenktb,
            ]);
        } else {
        }

        if ($request->file('dokumen_jaminan')) {
            if ($request->dokumenjaminanlama) {
                Storage::delete($request->dokumenjaminanlama);
            }

            $dokumen_jaminan = $request->file('dokumen_jaminan')->store('pasar-dokumen_jaminan');
            PasarJaminanLain::create([
                'pasar_pembiayaan_id' => $id,
                'dokumen_jaminan' => $dokumen_jaminan,
            ]);
        }

        PasarLegalitasRumah::where('pasar_pembiayaan_id', $id)->update([
            'pasar_pembiayaan_id' => $id,
            'kepemilikan_rumah' => $request->kepemilikan_rumah,
            'legalitas_kepemilikan_rumah' => $request->legalitas_kepemilikan_rumah,
            'dokumen_legalitas_kepemilikan_rumah' => $request->dokumen_legalitas_kepemilikan_rumah,
        ]);

        PasarPembiayaanHistory::create([
            'pasar_pembiayaan_id' => $id,
            'status_id' => 2,
            'jabatan_id' => 1,
            'user_id' => Auth::user()->id,
        ]);

        PasarKeteranganUsaha::where('pasar_pembiayaan_id', $id)->update([
            'pasar_pembiayaan_id' => $id,
            'jenispasar_id' => $request->jenispasar_id,
            'nama_usaha' => $request->nama_usaha,
            'lama_usaha' => $request->lama_usaha,
            'kep_toko_id' => $request->kep_toko_id,
            'leg_toko_id' => $request->leg_toko_id,
            'jenisdagang_id' => $request->jenisdagang_id,
            'no_blok' => $request->blok,
            'foto_id' => $id,
        ]);

        // $request->validate([
        //     'foto.*.kategori' => 'required',
        //     'foto.*.foto' => 'required',
        // ]);

        if (request('perbarui_lampiran') == 'Ya') {
            foreach ($request->foto as $key => $value) {
                if ($value['foto']) {
                    Storage::delete($value['foto_lama']);
                    $foto = $value['foto']->store('foto-pasar-pembiayaan');

                    PasarFoto::where('pasar_pembiayaan_id', $id)->where('id', $value['id'])->update([
                        'pasar_pembiayaan_id' => $id,
                        'kategori' => $value['kategori'],
                        'foto' => $foto,
                    ]);
                }
            }
        } else {
        }

        if ($request->slik[0]['nama_bank']) {

            PasarSlik::select()->where('pasar_pembiayaan_id', $id)->delete();

            foreach ($request->slik as $key => $value) {

                PasarSlik::create([
                    'pasar_pembiayaan_id' => $id,
                    'nama_bank' => $value['nama_bank'],
                    'plafond' => $value['plafond'],
                    'outstanding' => $value['outstanding'],
                    'tenor' => $value['tenor'],
                    'margin' => $value['margin'],
                    'angsuran' => $value['angsuran'],
                    'agunan' => $value['agunan'],
                    'kol' => $value['kol'],
                ]);
            }
        } else {
        }


        if ($request->slikpasangan[0]['nama_bank']) {

            PasarSlikPasangan::select()->where('pasar_pembiayaan_id', $id)->delete();
            foreach ($request->slikpasangan as $key => $value) {


                // return $value;
                PasarSlikPasangan::create([
                    'pasar_pembiayaan_id' => $id,
                    'nama_bank' => $value['nama_bank'],
                    'plafond' => $value['plafond'],
                    'outstanding' => $value['outstanding'],
                    'tenor' => $value['tenor'],
                    'margin' => $value['margin'],
                    'angsuran' => $value['angsuran'],
                    'agunan' => $value['agunan'],
                    'kol' => $value['kol'],
                ]);
            }
        } else {
        }





        return redirect('/pasar/komite/' . $id)->with('success', 'Proposal Pengajuan Sedang Dalam Proses Komite');
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
