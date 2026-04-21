<?php

namespace Modules\Form\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\P3k\Entities\P3kFoto;
use Modules\P3k\Entities\P3kNasabah;
use Modules\P3k\Entities\P3kOrangTerdekat;
use Modules\P3k\Entities\P3kPekerjaan;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;

class FormulirP3kController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('form::p3k.index', [
            'title' => 'Form P3K',
            'aos' => Role::select()->where('jabatan_id', 1)->where('divisi_id', 6)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('form::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $jmlPembiayaanP3k = P3kPembiayaan::select()->count();

        if ($jmlPembiayaanP3k == 0) {
            $hitungId = P3kPembiayaan::select()->count();
            $id = $hitungId + 1;
        } else {
            $hitungId = P3kPembiayaan::select()->latest()->first();
            $id = $hitungId->id + 1;
        }

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
        // Jika <= 50jt maka 14,5/tahun (1,208/bulan)
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


        //Store array foto
        foreach ($request->foto as $key => $value) {
            if ($value['foto']) {
                $fileName = time() . '_' . $value['foto']->getClientOriginalName();

                $foto = $value['foto']->storeAs('foto-p3k-pembiayaan', $fileName);
            }

            P3kFoto::create([
                'p3k_pembiayaan_id' => $id,
                'kategori' => $value['kategori'],
                'foto' => $foto,
            ]);
        }

        //Store file dengan nama asli
        $dokumenKeuangan = $request->file('dokumen_keuangan');
        $dokumenKeuanganName = time() . '_' . $dokumenKeuangan->getClientOriginalName();
        $request->file('dokumen_keuangan')->storeAs('p3k-dokumen-keuangan', $dokumenKeuanganName);
        $filePathDokumenKeuangan = 'p3k-dokumen-keuangan/' . $dokumenKeuanganName;

        //Konversi tgl untuk diinput ke db
        $tglPengajuan = Carbon::createFromFormat('d-m-Y', $request->tanggal_pengajuan)->format('Y-m-d');
        $tglLahir = Carbon::createFromFormat('d-m-Y', $request->tgl_lahir)->format('Y-m-d');

        //Jika menikah, isikan gaji pasangan
        if ($request->status_pernikahan == 'Menikah') {
            P3kPembiayaan::create([
                'id' => $id,
                'user_id' => $request->user_id,
                'pengajuan_fas_aktif_ke' => $request->pengajuan_fas_aktif_ke,
                'total_angsuran_btb_fas_aktif' => str_replace(['.', ','], '', $request->total_angsuran_btb_fas_aktif),
                'tanggal_pengajuan' => $tglPengajuan,
                'nominal_pembiayaan' => str_replace(['.', ','], '', $request->nominal_pembiayaan),
                'rate' => $rate,
                'tenor' => $request->tenor,
                'harga_margin' => $hargaMargin,
                'harga_jual' => $hargaJual,
                'jenis_penggunaan' => $request->jenis_penggunaan,
                'akad' => $akad,
                'p3k_nasabah_id' => $id,
                'jabatan' => $request->jabatan,
                'gaji_pokok' => str_replace(['.', ','], '', $request->gaji_pokok),
                'gaji_tpp' => str_replace(['.', ','], '', $request->gaji_tpp),
                'gaji_pasangan' => str_replace(['.', ','], '', $request->gaji_pasangan),
                'dokumen_keuangan' => $filePathDokumenKeuangan,
                'pengeluaran_lainnya' => str_replace(['.', ','], '', $request->pengeluaran_lainnya),
                'keterangan_pengeluaran_lainnya' => $request->keterangan_pengeluaran_lainnya,
            ]);
        } else {
            P3kPembiayaan::create([
                'id' => $id,
                'user_id' => $request->user_id,
                'pengajuan_fas_aktif_ke' => $request->pengajuan_fas_aktif_ke,
                'total_angsuran_btb_fas_aktif' => str_replace(['.', ','], '', $request->total_angsuran_btb_fas_aktif),
                'tanggal_pengajuan' => $tglPengajuan,
                'nominal_pembiayaan' => str_replace(['.', ','], '', $request->nominal_pembiayaan),
                'rate' => $rate,
                'tenor' => $request->tenor,
                'harga_margin' => $hargaMargin,
                'harga_jual' => $hargaJual,
                'jenis_penggunaan' => $request->jenis_penggunaan,
                'akad' => $akad,
                'p3k_nasabah_id' => $id,
                'jabatan' => $request->jabatan,
                'gaji_pokok' => str_replace(['.', ','], '', $request->gaji_pokok),
                'gaji_tpp' => str_replace(['.', ','], '', $request->gaji_tpp),
                'gaji_pasangan' => $request->gaji_pasangan,
                'dokumen_keuangan' => $filePathDokumenKeuangan,
                'pengeluaran_lainnya' => str_replace(['.', ','], '', $request->pengeluaran_lainnya),
                'keterangan_pengeluaran_lainnya' => $request->keterangan_pengeluaran_lainnya,
            ]);
        }


        P3kNasabah::create([
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

        P3kOrangTerdekat::create([
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

        //Store file dengan nama asli
        $dokumenSk = $request->file('dokumen_sk');
        $dokumenSkName = time() . '_' . $dokumenSk->getClientOriginalName();
        $request->file('dokumen_sk')->storeAs('p3k-dokumen-sk', $dokumenSkName);
        $filePathDokumenSk = 'p3k-dokumen-sk/' . $dokumenSkName;

        P3kPekerjaan::create([
            'p3k_nasabah_id' => $id,
            'dinas' => $request->dinas,
            'nama_unit_kerja' => $request->nama_unit_kerja,
            'jabatan' => $request->jabatan,
            'dokumen_sk' => $filePathDokumenSk,
            'no_sk' => $request->no_sk,
        ]);

        P3kPembiayaanHistory::create([
            'p3k_pembiayaan_id' => $id,
            'status_id' => 1,
            'jabatan_id' => 0,
            'divisi_id' => NULL,
            'user_id' => NULL,
        ]);

        return redirect('/')->with('success', 'Pengajuan P3K Berhasil Diajukan!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('form::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $nasabah = P3kNasabah::select()->where('id', $id)->first();
        if (!$nasabah) {
            abort(404);
        }

        $pembiayaan = P3kPembiayaan::select()->where('id', $id)->first();
        if (!$pembiayaan) {
            $pembiayaan = new P3kPembiayaan();
            $pembiayaan->id = $nasabah->id;
            $pembiayaan->setRelation('nasabah', $nasabah);
        }

        return view('form::p3k.nasabah', [
            'title' => 'Form P3K',
            'aos' => Role::select()->where('jabatan_id', 1)->where('divisi_id', 6)->get(),
            'pembiayaan' => $pembiayaan,
            'nasabah' => $nasabah,
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

        $hitungId = P3kPembiayaan::select()->latest()->first();
        $number = $hitungId->id + 1;

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
        // Jika <= 50jt maka 14,5/tahun (1,208/bulan)
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


        //Store array foto
        foreach ($request->foto as $key => $value) {
            if ($value['foto']) {
                $fileName = time() . '_' . $value['foto']->getClientOriginalName();

                $foto = $value['foto']->storeAs('foto-p3k-pembiayaan', $fileName);
            }

            P3kFoto::create([
                'p3k_pembiayaan_id' => $number,
                'kategori' => $value['kategori'],
                'foto' => $foto,
            ]);
        }

        //Store file dengan nama asli
        $dokumenKeuangan = $request->file('dokumen_keuangan');
        $dokumenKeuanganName = time() . '_' . $dokumenKeuangan->getClientOriginalName();
        $request->file('dokumen_keuangan')->storeAs('p3k-dokumen-keuangan', $dokumenKeuanganName);
        $filePathDokumenKeuangan = 'p3k-dokumen-keuangan/' . $dokumenKeuanganName;

        if ($request->status_pernikahan == 'Menikah') {
            P3kPembiayaan::create([
                'id' => $number,
                'user_id' => $request->user_id,
                'pengajuan_fas_aktif_ke' => $request->pengajuan_fas_aktif_ke,
                'total_angsuran_btb_fas_aktif' => str_replace(['.', ','], '', $request->total_angsuran_btb_fas_aktif),
                'tanggal_pengajuan' => $request->tanggal_pengajuan,
                'nominal_pembiayaan' => str_replace(['.', ','], '', $request->nominal_pembiayaan),
                'rate' => $rate,
                'tenor' => $request->tenor,
                'harga_margin' => $hargaMargin,
                'harga_jual' => $hargaJual,
                'jenis_penggunaan' => $request->jenis_penggunaan,
                'akad' => $akad,
                'p3k_nasabah_id' => $id,
                'jabatan' => $request->jabatan,
                'gaji_pokok' => str_replace(['.', ','], '', $request->gaji_pokok),
                'gaji_tpp' => str_replace(['.', ','], '', $request->gaji_tpp),
                'gaji_pasangan' => str_replace(['.', ','], '', $request->gaji_pasangan),
                'dokumen_keuangan' => $filePathDokumenKeuangan,
                'pengeluaran_lainnya' => str_replace(['.', ','], '', $request->pengeluaran_lainnya),
                'keterangan_pengeluaran_lainnya' => $request->keterangan_pengeluaran_lainnya,
            ]);
        } else {
            P3kPembiayaan::create([
                'id' => $number,
                'user_id' => $request->user_id,
                'pengajuan_fas_aktif_ke' => $request->pengajuan_fas_aktif_ke,
                'total_angsuran_btb_fas_aktif' => str_replace(['.', ','], '', $request->total_angsuran_btb_fas_aktif),
                'tanggal_pengajuan' => $request->tanggal_pengajuan,
                'nominal_pembiayaan' => str_replace(['.', ','], '', $request->nominal_pembiayaan),
                'rate' => $rate,
                'tenor' => $request->tenor,
                'harga_margin' => $hargaMargin,
                'harga_jual' => $hargaJual,
                'jenis_penggunaan' => $request->jenis_penggunaan,
                'akad' => $akad,
                'p3k_nasabah_id' => $id,
                'jabatan' => $request->jabatan,
                'gaji_pokok' => str_replace(['.', ','], '', $request->gaji_pokok),
                'gaji_tpp' => str_replace(['.', ','], '', $request->gaji_tpp),
                'gaji_pasangan' => $request->gaji_pasangan,
                'dokumen_keuangan' => $filePathDokumenKeuangan,
                'pengeluaran_lainnya' => str_replace(['.', ','], '', $request->pengeluaran_lainnya),
                'keterangan_pengeluaran_lainnya' => $request->keterangan_pengeluaran_lainnya,
            ]);
        }

        P3kNasabah::where('id', $id)->update([
            'nama_nasabah' => $request->nama_nasabah,
            'no_ktp' => $request->no_ktp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
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

        P3kOrangTerdekat::create([
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

        //Store file dengan nama asli
        $dokumenSk = $request->file('dokumen_sk');
        $dokumenSkName = time() . '_' . $dokumenSk->getClientOriginalName();
        $request->file('dokumen_sk')->storeAs('p3k-dokumen-sk', $dokumenSkName);
        $filePathDokumenSk = 'p3k-dokumen-sk/' . $dokumenSkName;

        P3kPekerjaan::create([
            'p3k_nasabah_id' => $id,
            'dinas' => $request->dinas,
            'nama_unit_kerja' => $request->nama_unit_kerja,
            'jabatan' => $request->jabatan,
            'dokumen_sk' => $filePathDokumenSk,
            'no_sk' => $request->no_sk,
        ]);

        P3kPembiayaanHistory::create([
            'p3k_pembiayaan_id' => $number,
            'status_id' => 1,
            'jabatan_id' => 0,
            'divisi_id' => NULL,
            'user_id' => NULL,
        ]);

        return redirect('/')->with('success', 'Pengajuan P3K Berhasil Diajukan!');
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
