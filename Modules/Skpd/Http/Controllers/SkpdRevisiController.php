<?php

namespace Modules\Skpd\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdSlik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
use Modules\Skpd\Entities\SkpdJenisNasabah;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Skpd\Entities\SkpdSlikPasangan;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class SkpdRevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        $search = $request->search;

        $latestSub = DB::table('skpd_pembiayaan_histories')
            ->select('skpd_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
            ->groupBy('skpd_pembiayaan_id');

        $histories = DB::query()
            ->fromSub($latestSub, 'sl')
            ->join('skpd_pembiayaan_histories as sh', 'sh.id', '=', 'sl.latest_id')
            ->join('skpd_pembiayaans as s', 's.id', '=', 'sl.skpd_pembiayaan_id')
            ->where('s.user_id', $userId)
            ->whereNotNull('s.skpd_sektor_ekonomi_id')
            ->where('sh.status_id', 7)
            ->get()
            ->keyBy('skpd_pembiayaan_id');

        $proposalIds = $histories->keys()->all();

        $proposal = SkpdPembiayaan::with(['nasabah', 'instansi'])
            ->whereIn('id', $proposalIds)
            ->when($search, fn($q) => $q->whereHas('nasabah', fn($q2) => $q2->where('nama_nasabah', 'like', "%{$search}%")))
            ->orderBy('id', 'desc')
            ->paginate(10)->withQueryString();

        return view('skpd::revisi.index', [
            'title' => 'Revisi Proposal',
            'proposals' => $proposal,
            'histories' => $histories,
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
            'title' => 'Revisi Proposal',
            'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->first(),
            'nasabah' => SkpdNasabah::select()->where('id', $id)->first(),
            'fotoPemohon' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->first(),
            'fotoPasangan' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Pasangan')->first(),
            'fotoKtp' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
            'fotoDiriBersamaKtp' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Diri Bersama KTP')->first(),
            'fotoKk' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
            'fotoStatus' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Akta Status Perkawinan')->orWhere('kategori', 'Akta Status Pekawinan')->first(),
            'fotoJaminan' => SkpdJaminan::select()->where('skpd_pembiayaan_id', $id)->first(),
            'fotoJaminanLainnya' => SkpdJaminanLainnya::select()->where('skpd_pembiayaan_id', $id)->first(),
            'lastIdJaminanLainnya' => SkpdJaminanLainnya::select('id')->latest()->first()?->id ?? 0,
            'ideb' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'IDEB')->first(),
            'idebPasangan' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'IDEB Pasangan')->first(),
            'aos' => Role::select()->where('jabatan_id', 1)->where('divisi_id', 1)->get(),
            'akads' => SkpdAkad::all(),
            'golongans' => SkpdGolongan::all(),
            'skpd_jaminan' => SkpdJaminan::select()->where('skpd_pembiayaan_id', $id)->first(),
            'instansis' => SkpdInstansi::all(),
            'jaminans' => SkpdJenisJaminan::all(),
            'penggunaans' => SkpdJenisPenggunaan::all(),
            'sektors' => SkpdSektorEkonomi::all(),
            'statusperkawinans' => SkpdStatusPerkawinan::all(),
            'tanggungans' => SkpdTanggungan::all(),
            'jenisNasabahs' => SkpdJenisNasabah::all(),

            'sliks' => SkpdSlik::select()->where('skpd_pembiayaan_id', $id)->get(),
            'if_slik' => SkpdSlik::select('deleted_at')->where('skpd_pembiayaan_id', $id)->first(),

            'sliks_pasangan' => SkpdSlikPasangan::select()->where('skpd_pembiayaan_id', $id)->get(),
            'if_slik_pasangan' => SkpdSlikPasangan::select()->where('skpd_pembiayaan_id', $id)->first(),
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
        $tglPengajuan = Carbon::createFromFormat('d-m-Y', $request->tanggal_pengajuan)->format('Y-m-d');
        $tglLahir = Carbon::createFromFormat('d-m-Y', $request->tgl_lahir)->format('Y-m-d');

        // return($request);
        // $sk_pengangkatan = $request->file('sk_pengangkatan')->store('skpd-sk_pengangkatan', 'public');
        // $dokumen_jaminan = $request->file('dokumen_jaminan')->store('skpd-dokumen_jaminan', 'public');
        // $dokumen_keuangan = $request->file('dokumen_keuangan')->store('skpd-dokumen_keuangan', 'public');
        // $dokumen_slip_gaji = $request->file('dokumen_slip_gaji')->store('skpd-dokumen_slip_gaji', 'public');

        SkpdPembiayaan::where('id', $id)->update([
            'id' => $id,
            'user_id' => $request->user_id,
            'tanggal_pengajuan' => $tglPengajuan,
            'nominal_pembiayaan' => str_replace(".", "", $request->nominal_pembiayaan),
            'tenor' => $request->tenor,
            'rate' => str_replace(",", ".", $request->rate),
            'skpd_jenis_penggunaan_id' => $request->skpd_jenis_penggunaan_id,
            'skpd_sektor_ekonomi_id' => $request->skpd_sektor_ekonomi_id,
            'skpd_akad_id' => $request->skpd_akad_id,
            'skpd_nasabah_id' => $id,
            'skpd_jenis_nasabah_id' => $request->skpd_jenis_nasabah_id,
            'skpd_instansi_id' => $request->skpd_instansi_id,
            'skpd_golongan_id' => $request->skpd_golongan_id,
            'jabatan' => $request->jabatan,
            'gaji_pokok' => str_replace(".", "", $request->gaji_pokok),
            'pendapatan_lainnya' => str_replace(".", "", $request->pendapatan_lainnya),
            'gaji_tpp' => str_replace(".", "", $request->gaji_tpp),
            'pengeluaran_lainnya' => str_replace(".", "", $request->pengeluaran_lainnya),
            'keterangan_pengeluaran_lainnya' => $request->keterangan_pengeluaran_lainnya,
        ]);


        SkpdJaminan::where('skpd_pembiayaan_id', $id)->update([
            'skpd_jenis_jaminan_id' => $request->skpd_jenis_jaminan_id,
        ]);

        SkpdNasabah::where('id', $id)->update([
            'id' => $id,
            'nama_nasabah' => $request->nama_nasabah,
            'no_ktp' => $request->no_ktp,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $tglLahir,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'desa_kelurahan' => $request->desa_kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabkota' => $request->kabkota,
            'provinsi' => $request->provinsi,
            'kd_pos' => $request->kd_pos,
            'alamat_domisili' => $request->alamat_domisili,
            'rt_domisili' => $request->rt_domisili,
            'rw_domisili' => $request->rw_domisili,
            'desa_kelurahan_domisili' => $request->desa_kelurahan_domisili,
            'kecamatan_domisili' => $request->kecamatan_domisili,
            'kabkota_domisili' => $request->kabkota_domisili,
            'provinsi_domisili' => $request->provinsi_domisili,
            'kd_pos_domisili' => $request->kd_pos_domisili,
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
            'kd_pos_orang_terdekat' => $request->kd_pos_orang_terdekat,
            'no_telp_orang_terdekat' => str_replace("+62 0", "", $request->no_telp_orang_terdekat),
        ]);

        SkpdPembiayaanHistory::create([
            'skpd_pembiayaan_id' => $id,
            'status_id' => 2,
            'jabatan_id' => 1,
            'user_id' => Auth::user()->id,
        ]);

        //Perbarui Foto Pemohon
        if (request('perbarui_foto_pemohon') == 'Ya') {
            if (request('foto_pemohon_lama')) {
                Storage::disk('public')->delete(request('foto_pemohon_lama'));
            }
            $foto_pemohon = $request->file('foto_pemohon')->store('foto-skpd-pembiayaan', 'public');
            SkpdFoto::where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->update([
                'foto'  => $foto_pemohon,
            ]);
        }

        //Perbarui Foto Pasangan
        if (request('perbarui_foto_pasangan') == 'Ya') {
            if (request('foto_pasangan_lama')) {
                Storage::disk('public')->delete(request('foto_pasangan_lama'));
            }
            $foto_pasangan = $request->file('foto_pasangan')->store('foto-skpd-pembiayaan', 'public');
            SkpdFoto::where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Pasangan')->update([
                'foto'  => $foto_pasangan,
            ]);
        }

        //Perbarui Foto KTP
        if (request('perbarui_foto_ktp') == 'Ya') {
            if (request('foto_ktp_lama')) {
                Storage::disk('public')->delete(request('foto_ktp_lama'));
            }
            $foto_ktp = $request->file('foto_ktp')->store('foto-skpd-pembiayaan', 'public');
            SkpdFoto::where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->update([
                'foto'  => $foto_ktp,
            ]);
        }

        //Perbarui Foto Diri bersama KTP
        if (request('perbarui_foto_diri_ktp') == 'Ya') {
            if (request('foto_diri_ktp_lama')) {
                Storage::disk('public')->delete(request('foto_diri_ktp_lama'));
            }
            $foto_diri_ktp = $request->file('foto_diri_ktp')->store('foto-skpd-pembiayaan', 'public');
            SkpdFoto::where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Diri Bersama KTP')->update([
                'foto'  => $foto_diri_ktp,
            ]);
        }

        //Perbarui Foto KK
        if (request('perbarui_foto_kk') == 'Ya') {
            if (request('foto_kk_lama')) {
                Storage::disk('public')->delete(request('foto_kk_lama'));
            }
            $foto_kk = $request->file('foto_kk')->store('foto-skpd-pembiayaan', 'public');
            SkpdFoto::where('skpd_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->update([
                'foto'  => $foto_kk,
            ]);
        }

        //Perbarui Foto Akta Nikah/Cerai
        if (request('perbarui_foto_akta_nikah_cerai') == 'Ya') {
            if (request('foto_akta_nikah_cerai_lama')) {
                Storage::disk('public')->delete(request('foto_akta_nikah_cerai_lama'));
            }
            $foto_akta_nikah_cerai = $request->file('foto_akta_nikah_cerai')->store('foto-skpd-pembiayaan', 'public');
            SkpdFoto::where('skpd_pembiayaan_id', $id)->where('kategori', 'Akta Status Perkawinan')->orWhere('kategori', 'Akta Status Pekawinan')->update([
                'foto'  => $foto_akta_nikah_cerai,
            ]);
        }

        //Perbarui Foto SK
        if (request('perbarui_foto_sk') == 'Ya') {
            if (request('foto_sk_lama')) {
                Storage::disk('public')->delete(request('foto_sk_lama'));
            }
            $foto_sk = $request->file('foto_sk')->store('skpd-sk_pengangkatan', 'public');
            SkpdPembiayaan::where('id', $id)->update([
                'sk_pengangkatan'  => $foto_sk,
            ]);
        }

        //Perbarui Foto Keuangan
        if (request('perbarui_foto_keuangan') == 'Ya') {
            if (request('foto_keuangan_lama')) {
                Storage::disk('public')->delete(request('foto_keuangan_lama'));
            }
            $foto_keuangan = $request->file('foto_keuangan')->store('skpd-dokumen_keuangan', 'public');
            SkpdPembiayaan::where('id', $id)->update([
                'dokumen_keuangan'  => $foto_keuangan,
            ]);
        }

        //Perbarui Foto Slip Gaji
        if (request('perbarui_foto_slip_gaji') == 'Ya') {
            if (request('foto_slip_gaji_lama')) {
                Storage::disk('public')->delete(request('foto_slip_gaji_lama'));
            }
            $foto_slip_gaji = $request->file('foto_slip_gaji')->store('skpd-dokumen_slip_gaji', 'public');
            SkpdPembiayaan::where('id', $id)->update([
                'dokumen_slip_gaji'  => $foto_slip_gaji,
            ]);
        }

        //Perbarui Foto Jaminan
        if (request('perbarui_foto_jaminan') == 'Ya') {
            if (request('foto_jaminan_lama')) {
                Storage::disk('public')->delete(request('foto_jaminan_lama'));
            }
            $foto_jaminan = $request->file('foto_jaminan')->store('skpd-dokumen_jaminan', 'public');
            SkpdJaminan::where('skpd_pembiayaan_id', $id)->update([
                'dokumen_jaminan'  => $foto_jaminan,
            ]);
        }

        //Perbarui Foto Jaminan Lainnya
        if (request('perbarui_foto_jaminan_lainnya') == 'Ya') {
            if (request('foto_jaminan_lainnya_lama')) {
                Storage::disk('public')->delete(request('foto_jaminan_lainnya_lama'));
            }
            $foto_jaminan_lainnya = $request->file('foto_jaminan_lainnya')->store('skpd-dokumen_jaminan_lainnya', 'public');
            SkpdJaminanLainnya::updateOrCreate(
                [
                    'id' => $request->id_jaminan_lainnya,
                ],
                [
                    'skpd_pembiayaan_id' => $id,
                    'nama_jaminan_lainnya'  => $request->nama_jaminan_lainnya,
                    'dokumen_jaminan_lainnya'  => $foto_jaminan_lainnya,

                ]
            );
        }

        //Perbarui Foto IDEB
        if (request('perbarui_ideb') == 'Ya') {
            if (request('ideb_lama')) {
                Storage::disk('public')->delete(request('ideb_lama'));
            }
            $ideb = $request->file('ideb')->store('foto-skpd-pembiayaan', 'public');
            SkpdFoto::where('skpd_pembiayaan_id', $id)->where('kategori', 'IDEB')->update([
                'foto'  => $ideb,
            ]);
        }

        //Perbarui Foto IDEB Pasangan
        if ($request->skpd_status_perkawinan_id == 2) {
            if (request('perbarui_ideb_pasangan') == 'Ya') {
                if (request('ideb_pasangan_lama')) {
                    Storage::disk('public')->delete(request('ideb_pasangan_lama'));
                }
                $ideb_pasangan = $request->file('ideb_pasangan')->store('foto-skpd-pembiayaan', 'public');
                SkpdFoto::where('skpd_pembiayaan_id', $id)->where('kategori', 'IDEB Pasangan')->update([
                    'foto'  => $ideb_pasangan,
                ]);
            }
        }



        // if ($request->file('dokumen_keuangan')) {
        //     if ($request->dokumen_keuangan_lama) {
        //         Storage::disk('public')->delete($request->dokumen_keuangan_lama);
        //     }
        //     $dokumen_keuangan = $request->file('dokumen_keuangan')->store('skpd-dokumen_keuangan', 'public');
        //     SkpdPembiayaan::where('id', $id)->update([
        //         'dokumen_keuangan' => $dokumen_keuangan,
        //     ]);
        // }

        // if ($request->file('dokumen_slip_gaji')) {
        //     if ($request->dokumen_slip_gaji_lama) {
        //         Storage::disk('public')->delete($request->dokumen_slip_gaji_lama);
        //     }
        //     $dokumen_slip_gaji = $request->file('dokumen_slip_gaji')->store('skpd-dokumen_slip_gaji', 'public');
        //     SkpdPembiayaan::where('id', $id)->update([
        //         'dokumen_slip_gaji' => $dokumen_slip_gaji,
        //     ]);
        // }
        // if ($request->file('sk_pengangkatan')) {
        //     if ($request->sk_pengangkatan_lama) {
        //         Storage::disk('public')->delete($request->sk_pengangkatan_lama);
        //     }
        //     $sk_pengangkatan = $request->file('sk_pengangkatan')->store('skpd-sk_pengangkatan', 'public');
        //     SkpdPembiayaan::where('id', $id)->update([
        //         'sk_pengangkatan' => $sk_pengangkatan,
        //     ]);
        // }

        // if ($request->file('dokumen_jaminan_lainnya')) {
        //     $dokumen_jaminan_lainnya = $request->file('dokumen_jaminan_lainnya')->store('skpd-dokumen_jaminan_lainnya', 'public');
        //     SkpdJaminanLainnya::where('skpd_pembiayaan_id', $id)->update([
        //         'skpd_pembiayaan_id' => $id,
        //         'nama_jaminan_lainnya' => $request->skpd_jenis_jaminan_id,
        //         'dokumen_jaminan_lainnya' => $dokumen_jaminan_lainnya,
        //     ]);
        // }


        // $request->validate([
        //     'foto.*.kategori' => 'required',
        //     'foto.*.foto' => 'required',
        // ]);

        // foreach ($request->foto as $key => $value) {
        //     if ($value['foto'] != null) {
        //         if ($value['foto_lama']) {
        //             Storage::disk('public')->delete($value['foto_lama']);
        //         }
        //         $foto = $value['foto']->store('foto-skpd-pembiayaan', 'public');

        //         SkpdFoto::where('skpd_pembiayaan_id', $id)->where('id', $value['id'])->update([
        //             'skpd_pembiayaan_id' => $id,
        //             'kategori' => $value['kategori'],
        //             'foto' => $foto,
        //         ]);
        //     }
        // }

        // if ($request->file('ideb')) {
        //     if ($request->ideb_lama) {
        //         Storage::disk('public')->delete($request->ideb_lama);
        //     }
        //     $ideb = $request->file('ideb')->store('foto-skpd-pembiayaan', 'public');
        //     SkpdFoto::where('skpd_pembiayaan_id', $id)->update([
        //         'skpd_pembiayaan_id' => $id,
        //         'kategori' => 'IDEB',
        //         'foto' => $ideb,
        //     ]);
        // }

        //Slik
        if (!empty($request->repeater_slik) && !empty($request->repeater_slik[0]['nama_bank'])) {

            foreach ($request->repeater_slik as $key => $value) {
                SkpdSlik::updateOrCreate(
                    [
                        'id' => $value['id'],
                    ],
                    [
                        'skpd_pembiayaan_id' => $id,
                        'nama_bank' => $value['nama_bank'],
                        'plafond' => str_replace(".", "", $value['plafond']),
                        'outstanding' => str_replace(".", "", $value['outstanding']),
                        'tenor' => $value['tenor'],
                        'margin' => $value['margin'],
                        'angsuran' => str_replace(".", "", $value['angsuran']),
                        'agunan' => $value['agunan'],
                        'kol_tertinggi' => $value['kol_tertinggi'],
                    ]
                );
            }
        } else {
        }

        //Slik Pasangan
        if ($request->skpd_status_perkawinan_id == 2) {
            if (!empty($request->repeater_slik_pasangan) && !empty($request->repeater_slik_pasangan[0]['nama_bank'])) {

                foreach ($request->repeater_slik_pasangan as $key => $value) {
                    SkpdSlikPasangan::updateOrCreate(
                        [
                            'id' => $value['id'],
                        ],
                        [
                            'skpd_pembiayaan_id' => $id,
                            'nama_bank' => $value['nama_bank'],
                            'plafond' => str_replace(".", "", $value['plafond']),
                            'outstanding' => str_replace(".", "", $value['outstanding']),
                            'tenor' => $value['tenor'],
                            'margin' => $value['margin'],
                            'angsuran' => str_replace(".", "", $value['angsuran']),
                            'agunan' => $value['agunan'],
                            'kol_tertinggi' => $value['kol_tertinggi'],
                        ]
                    );
                }
            } else {
            }
        }


        return redirect('/skpd/komite')->with('success', 'Proposal Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if (request('delete_repeater') == 'Hapus Slik') {
            SkpdSlik::select()->where('skpd_pembiayaan_id', $id)->delete();
            return redirect('/skpd/revisi/' . $id . '/edit')->with('success', 'Data Slik Berhasil Dihapus!');
        } elseif (request('delete_repeater') == 'Hapus Slik Pasangan') {
            SkpdSlikPasangan::select()->where('skpd_pembiayaan_id', $id)->delete();
            return redirect('/skpd/revisi/' . $id . '/edit')->with('success', 'Data Slik Pasangan Berhasil Dihapus!');
        } else {
        }
    }
}
