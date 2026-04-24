<?php

namespace Modules\P3k\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Modules\P3k\Entities\P3kFoto;
use Modules\P3k\Entities\P3kNasabah;
use Modules\P3k\Entities\P3kOrangTerdekat;
use Modules\P3k\Entities\P3kPekerjaan;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;

class P3kRevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $latestSub = P3kPembiayaanHistory::selectRaw('p3k_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('p3k_pembiayaan_id');

        $proposals = P3kPembiayaan::with(['nasabah.pekerjaan'])
            ->where('p3k_pembiayaans.user_id', Auth::id())
            ->whereNotNull('dokumen_ideb')
            ->joinSub($latestSub, 'lh', function ($join) {
                $join->on('p3k_pembiayaans.id', '=', 'lh.p3k_pembiayaan_id');
            })
            ->join('p3k_pembiayaan_histories as ph', 'ph.id', '=', 'lh.latest_id')
            ->where('ph.status_id', 7)
            ->when($search, function ($q) use ($search) {
                $q->whereHas('nasabah', function ($q2) use ($search) {
                    $q2->where('nama_nasabah', 'like', "%{$search}%")
                        ->orWhere('no_ktp', 'like', "%{$search}%");
                });
            })
            ->select('p3k_pembiayaans.*')
            ->orderBy('p3k_pembiayaans.id', 'desc')
            ->paginate(25)
            ->appends($request->only('search'));

        return view('p3k::revisi.index', [
            'title' => 'Revisi Proposal',
            'proposals' => $proposals,
            'search' => $search,
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
        $dataFoto = P3kFoto::select()->where('p3k_pembiayaan_id', $id)->get();
        $foto = $dataFoto;
        return view('p3k::revisi.lihat', [
            'title' => 'Detail Proposal',
            'pembiayaan' => P3kPembiayaan::select()->where('id', $id)->first(),
            'nasabah' => P3kNasabah::select()->where('id', $id)->first(),
            'aos' => Role::select()->where('jabatan_id', 1)->where('divisi_id', 6)->get(),
            'fotoKtp' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
            'fotoKartuKeluarga' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
            'fotoNpwp' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto NPWP')->first(),
            'fotoKtpPasangan' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto KTP Pasangan')->first(),
            'idebPasangan' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'IDEB Pasangan')->first(),
            'fotoStatusPernikahan' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'Akta Status Pernikahan/Perceraian')->first(),
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
        //Menentukan jenis akad berdasarkan jenis penggunaan
        if (
            $request->jenis_penggunaan == "Modal Kerja" ||
            $request->jenis_penggunaan == "Renovasi Rumah" ||
            $request->jenis_penggunaan == "Pembelian Kendaraan Bermotor"
        ) {
            $akad = "Murabahah";
        } else {
            $akad = "Ijarah Multijasa";
        }

        //Plafond
        $plafond = str_replace(['.', ','], '', $request->nominal_pembiayaan);

        //Hitung rate
        // Jika <= 50jt maka 12/tahun (1/bulan)
        if ($plafond <= 50000000) {
            // $rate = 1;
            $rate = 12 / 12;
        }
        // Jika > 50jt maka 11,5/tahun (0,958/bulan)
        else {
            // $rate = 0.958333333;
            $rate = 11.5 / 12;
        }

        //Hitung harga margin
        $hargaMargin = $plafond * ($rate / 100) * $request->tenor;

        //Hitung harga jual
        $hargaJual = $plafond * ($rate / 100) * $request->tenor + $plafond;

        // //Store file dengan nama asli
        // $dokumenKeuangan = $request->file('dokumen_keuangan');
        // $dokumenKeuanganName = time() . '_' . $dokumenKeuangan->getClientOriginalName();
        // $request->file('dokumen_keuangan')->storeAs('p3k-dokumen-keuangan', $dokumenKeuanganName);
        // $filePathDokumenKeuangan = 'p3k-dokumen-keuangan/' . $dokumenKeuanganName;

        // //Store file dengan nama asli
        // $dokumenSk = $request->file('dokumen_sk');
        // $dokumenSkName = time() . '_' . $dokumenSk->getClientOriginalName();
        // $request->file('dokumen_sk')->storeAs('p3k-dokumen-sk', $dokumenSkName);
        // $filePathDokumenSk = 'p3k-dokumen-sk/' . $dokumenSkName;

        //Konversi tgl untuk diinput ke db
        $tglPengajuan = Carbon::createFromFormat('d-m-Y', $request->tanggal_pengajuan)->format('Y-m-d');
        $tglLahir = Carbon::createFromFormat('d-m-Y', $request->tgl_lahir)->format('Y-m-d');

        if ($request->status_pernikahan == 'Menikah') {
            P3kPembiayaan::where('id', $id)->update([
                'id' => $id,
                'user_id' => $request->user_id,
                'pengajuan_fas_aktif_ke' => $request->pengajuan_fas_aktif_ke,
                'total_angsuran_btb_fas_aktif' => str_replace(['.', ','], '', $request->total_angsuran_btb_fas_aktif),
                'tanggal_pengajuan' => $tglPengajuan,
                'nominal_pembiayaan' => str_replace(['.', ','], '', $request->nominal_pembiayaan),
                'rate' => $rate,
                'tenor' => $request->tenor,
                // 'harga_margin' => $hargaMargin,
                'harga_jual' => $hargaJual,
                'jenis_penggunaan' => $request->jenis_penggunaan,
                'akad' => $akad,
                'p3k_nasabah_id' => $id,
                'jabatan' => $request->jabatan,
                'gaji_pokok' => str_replace(['.', ','], '', $request->gaji_pokok),
                'gaji_tpp' => str_replace(['.', ','], '', $request->gaji_tpp),
                'gaji_pasangan' => str_replace(['.', ','], '', $request->gaji_pasangan),
                // 'dokumen_keuangan' => $filePathDokumenKeuangan,
                'pengeluaran_lainnya' => str_replace(['.', ','], '', $request->pengeluaran_lainnya),
                'keterangan_pengeluaran_lainnya' => $request->keterangan_pengeluaran_lainnya,
            ]);
        } else {
            P3kPembiayaan::where('id', $id)->update([
                'id' => $id,
                'user_id' => $request->user_id,
                'pengajuan_fas_aktif_ke' => $request->pengajuan_fas_aktif_ke,
                'total_angsuran_btb_fas_aktif' => str_replace(['.', ','], '', $request->total_angsuran_btb_fas_aktif),
                'tanggal_pengajuan' => $tglPengajuan,
                'nominal_pembiayaan' => str_replace(['.', ','], '', $request->nominal_pembiayaan),
                'rate' => $rate,
                'tenor' => $request->tenor,
                // 'harga_margin' => $hargaMargin,
                'harga_jual' => $hargaJual,
                'jenis_penggunaan' => $request->jenis_penggunaan,
                'akad' => $akad,
                'p3k_nasabah_id' => $id,
                'jabatan' => $request->jabatan,
                'gaji_pokok' => str_replace(['.', ','], '', $request->gaji_pokok),
                'gaji_tpp' => str_replace(['.', ','], '', $request->gaji_tpp),
                'gaji_pasangan' => $request->gaji_pasangan,
                // 'dokumen_keuangan' => $filePathDokumenKeuangan,
                'pengeluaran_lainnya' => str_replace(['.', ','], '', $request->pengeluaran_lainnya),
                'keterangan_pengeluaran_lainnya' => $request->keterangan_pengeluaran_lainnya,
            ]);
        }


        P3kNasabah::where('id', $id)->update([
            'id' => $id,
            'nama_nasabah' => $request->nama_nasabah,
            'no_ktp' => $request->no_ktp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
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
            'no_telp' => str_replace("+62 0", "", $request->no_telp),
            'no_hp' => str_replace("+62 0", "", $request->no_hp),
            'status_pernikahan' => $request->status_pernikahan,
            'nama_pasangan_nasabah' => $request->nama_pasangan_nasabah,
            'no_ktp_pasangan' => $request->no_ktp_pasangan,
            'jml_tanggungan' => $request->jml_tanggungan,
        ]);

        P3kPekerjaan::where('id', $id)->update([
            'p3k_nasabah_id' => $id,
            'nama_unit_kerja' => $request->nama_unit_kerja,
            'jabatan' => $request->jabatan,
            'no_sk' => $request->no_sk,
            // 'dokumen_sk' => $filePathDokumenSk,
        ]);

        P3kOrangTerdekat::where('id', $id)->update([
            'p3k_nasabah_id' => $id,
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

        P3kPembiayaanHistory::create([
            'p3k_pembiayaan_id' => $id,
            'status_id' => 2,
            'jabatan_id' => 1,
            'user_id' => Auth::user()->id,
        ]);

        //Perbarui Foto KTP
        if (request('perbarui_foto_ktp') == 'Ya') {
            if (request('foto_ktp_lama')) {
                Storage::disk('public')->delete(request('foto_ktp_lama'));
            }
            $foto_ktp = $request->file('foto_ktp')->store('foto-p3k-pembiayaan', 'public');
            P3kFoto::where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->update([
                'foto'  => $foto_ktp,
            ]);
        }

        //Perbarui Foto Pasangan
        if (request('perbarui_foto_ktp_pasangan') == 'Ya') {
            if (request('foto_ktp_pasangan_lama')) {
                Storage::disk('public')->delete(request('foto_ktp_pasangan_lama'));
            }
            $foto_ktp_pasangan = $request->file('foto_ktp_pasangan')->store('foto-p3k-pembiayaan', 'public');
            P3kFoto::where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto KTP Pasangan')->update([
                'foto'  => $foto_ktp_pasangan,
            ]);
        }

        //Perbarui Foto NPWP
        if (request('perbarui_foto_npwp') == 'Ya') {
            if (request('foto_npwp_lama')) {
                Storage::disk('public')->delete(request('foto_npwp_lama'));
            }
            $foto_npwp = $request->file('foto_npwp')->store('foto-p3k-pembiayaan', 'public');
            P3kFoto::where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto NPWP')->update([
                'foto'  => $foto_npwp,
            ]);
        }


        //Perbarui Foto KK
        if (request('perbarui_foto_kk') == 'Ya') {
            if (request('foto_kk_lama')) {
                Storage::disk('public')->delete(request('foto_kk_lama'));
            }
            $foto_kk = $request->file('foto_kk')->store('foto-p3k-pembiayaan', 'public');
            P3kFoto::where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->update([
                'foto'  => $foto_kk,
            ]);
        }

        //Perbarui Foto Status Pernikahan
        if (request('perbarui_foto_status_pernikahan') == 'Ya') {
            if (request('foto_status_pernikahan_lama')) {
                Storage::disk('public')->delete(request('foto_status_pernikahan_lama'));
            }
            $foto_status_pernikahan = $request->file('foto_status_pernikahan')->store('foto-p3k-pembiayaan', 'public');
            P3kFoto::where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto Status Pernikahan/Perceraian')->update([
                'foto'  => $foto_status_pernikahan,
            ]);
        }

        //Perbarui Foto SK
        if (request('perbarui_foto_sk') == 'Ya') {
            if (request('foto_sk_lama')) {
                Storage::disk('public')->delete(request('foto_sk_lama'));
            }
            $foto_sk = $request->file('foto_sk')->store('p3k-dokumen-sk', 'public');
            P3kPekerjaan::where('id', $id)->update([
                'dokumen_sk'  => $foto_sk,
            ]);
        }

        //Perbarui Foto Lampiran Keuangan
        if (request('perbarui_foto_lampiran_keuangan') == 'Ya') {
            if (request('foto_lampiran_keuangan_lama')) {
                Storage::disk('public')->delete(request('foto_lampiran_keuangan_lama'));
            }
            $foto_lampiran_keuangan = $request->file('foto_lampiran_keuangan')->store('p3k-dokumen-keuangan', 'public');
            P3kPembiayaan::where('id', $id)->update([
                'dokumen_keuangan'  => $foto_lampiran_keuangan,
            ]);
        }

        //Perbarui IDEB
        if (request('perbarui_ideb') == 'Ya') {
            if (!$request->hasFile('ideb')) {
                return back()
                    ->withInput()
                    ->withErrors(['ideb' => 'File IDEB wajib diupload jika memilih Perbarui Lampiran = Ya.']);
            }

            $ideb = $request->file('ideb')->store('p3k-dokumen-ideb', 'public');

            if (request('ideb_lama')) {
                Storage::disk('public')->delete(request('ideb_lama'));
            }

            P3kPembiayaan::where('id', $id)->update([
                'dokumen_ideb'  => $ideb,
            ]);
        }

        //Perbarui IDEB Pasangan
        if ($request->status_pernikahan == "Menikah") {
            if (request('perbarui_ideb_pasangan') == 'Ya') {
                if (!$request->hasFile('ideb_pasangan')) {
                    return back()
                        ->withInput()
                        ->withErrors(['ideb_pasangan' => 'File IDEB Pasangan wajib diupload jika memilih Perbarui Lampiran = Ya.']);
                }

                $ideb_pasangan = $request->file('ideb_pasangan')->store('foto-p3k-pembiayaan', 'public');

                if (request('ideb_pasangan_lama')) {
                    Storage::disk('public')->delete(request('ideb_pasangan_lama'));
                }

                P3kFoto::where('p3k_pembiayaan_id', $id)->where('kategori', 'IDEB Pasangan')->update([
                    'foto'  => $ideb_pasangan,
                ]);
            }
        }
        return redirect('/p3k/komite')->with('success', 'Proposal Berhasil Diperbarui!');
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
