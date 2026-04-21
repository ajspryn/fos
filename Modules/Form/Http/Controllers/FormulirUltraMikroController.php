<?php

namespace Modules\Form\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\UltraMikro\Entities\UltraMikroFoto;
use Modules\UltraMikro\Entities\UltraMikroNasabah;
use Modules\UltraMikro\Entities\UltraMikroPembiayaan;
use Modules\UltraMikro\Entities\UltraMikroPembiayaanHistory;
use Modules\UltraMikro\Entities\UltraMikroPetugasLapangan;
use Modules\UltraMikro\Entities\UltraMikroScoreKelompok;
use Modules\UltraMikro\Entities\UltraMikroScoreRepayment;
use Modules\UltraMikro\Entities\UltraMikroScoreTempatTinggal;

class FormulirUltraMikroController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (request('jenis_pby_ultra_mikro') == 'Restruct') {
            return view('form::ultra_mikro.indexRestruct', [
                'title' => 'Formulir Ultra Mikro',
                'aos' => Role::select()->where('jabatan_id', 1)->where('divisi_id', 7)->get(),
                'petugasLapangans' => UltraMikroPetugasLapangan::select()->get(),
                'repayments' => UltraMikroScoreRepayment::select()->get(),
                'statusKelompoks' => UltraMikroScoreKelompok::select()->get(),
                'statusTempatTinggals' => UltraMikroScoreTempatTinggal::select()->get(),
            ]);
        } else {
            return view('form::ultra_mikro.indexBaru', [
                'title' => 'Formulir Ultra Mikro',
                'aos' => Role::select()->where('jabatan_id', 1)->where('divisi_id', 7)->get(),
                'petugasLapangans' => UltraMikroPetugasLapangan::select()->get(),
                'repayments' => UltraMikroScoreRepayment::select()->get(),
                'statusKelompoks' => UltraMikroScoreKelompok::select()->get(),
                'statusTempatTinggals' => UltraMikroScoreTempatTinggal::select()->get(),
            ]);
        }
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
        $jmlPembiayaanUm = UltraMikroPembiayaan::select()->count();

        if ($jmlPembiayaanUm == 0) {
            $hitungId = UltraMikroPembiayaan::select()->count();
            $id = $hitungId + 1;
        } else {
            $hitungId = UltraMikroPembiayaan::select()->latest()->first();
            $id = $hitungId->id + 1;
        }

        //Menentukan jenis akad berdasarkan jenis penggunaan
        // if ($request->jenis_penggunaan == "Modal Kerja" || $request->jenis_penggunaan == "Renovasi Rumah") {
        //     $akad = "Murabahah";
        // } else {
        //     $akad = "Ijarah Multijasa";
        // }

        //Plafond
        $plafond = str_replace(".", "", $request->nominal_pembiayaan);


        //Store array foto
        foreach ($request->foto as $key => $value) {
            if ($value['foto']) {
                $fileName = time() . '_' . $value['foto']->getClientOriginalName();

                $foto = $value['foto']->storeAs('foto-ultra-mikro-pembiayaan', $fileName);
            }

            UltraMikroFoto::create([
                'ultra_mikro_pembiayaan_id' => $id,
                'kategori' => $value['kategori'],
                'foto' => $foto,
            ]);
        }

        // //Store file dengan nama asli
        // $dokumenKeuangan = $request->file('dokumen_keuangan');
        // $dokumenKeuanganName = time() . '_' . $dokumenKeuangan->getClientOriginalName();
        // $request->file('dokumen_keuangan')->storeAs('p3k-dokumen-keuangan', $dokumenKeuanganName);
        // $filePathDokumenKeuangan = 'p3k-dokumen-keuangan/' . $dokumenKeuanganName;

        //Konversi tgl untuk diinput ke db
        $now = Carbon::now()->format('d-m-Y');
        $tglPengajuan = Carbon::createFromFormat('d-m-Y', $now)->format('Y-m-d');
        $tglKunjungan = Carbon::createFromFormat('d-m-Y', $request->tanggal_kunjungan)->format('Y-m-d');
        $tglLahir = Carbon::createFromFormat('d-m-Y', $request->tgl_lahir)->format('Y-m-d');
        $usiaPengajuan = Carbon::parse($request->tgl_lahir)->age;

        $prefixNoAplikasi = "BTB/UM/";


        if ($request->jenis_pby_ultra_mikro == "Restruct") {

            UltraMikroPembiayaan::create([
                'id' => $id,
                'jenis_pby_ultra_mikro' => $request->jenis_pby_ultra_mikro,
                'tanggal_pengajuan' => $tglPengajuan,
                'nomor_aplikasi' => $prefixNoAplikasi . $id,
                'tanggal_kunjungan' => $tglKunjungan,
                'user_id' => $request->user_id,
                'petugas_lapangan_id' => $request->petugas_lapangan_id,
                'nominal_pembiayaan' => str_replace(".", "", $request->nominal_pembiayaan),
                'tenor' => $request->tenor,
                'tujuan_pembiayaan' => $request->tujuan_pembiayaan,
                'akad' => $request->akad,
                'repayment_id' => $request->repayment_id,
                'status_kelompok_id' => $request->status_kelompok_id,
                'status_tempat_tinggal_id' => $request->status_tempat_tinggal_id,
                'frekuensi_pembayaran' => $request->frekuensi_pembayaran,
                'ultra_mikro_nasabah_id' => $id,
                'penghasilan' => str_replace(".", "", $request->penghasilan),
                'pengeluaran' => str_replace(".", "", $request->pengeluaran),
            ]);
        } else { //Pby Baru
            UltraMikroPembiayaan::create([
                'id' => $id,
                'jenis_pby_ultra_mikro' => $request->jenis_pby_ultra_mikro,
                'tanggal_pengajuan' => $tglPengajuan,
                'nomor_aplikasi' => $prefixNoAplikasi . $id,
                'tanggal_kunjungan' => $tglKunjungan,
                'user_id' => $request->user_id,
                'petugas_lapangan_id' => $request->petugas_lapangan_id,
                'nominal_pembiayaan' => str_replace(".", "", $request->nominal_pembiayaan),
                'tenor' => $request->tenor,
                'rate' => $request->rate,
                'harga_jual' => str_replace(".", "", $request->harga_jual),
                'biaya' => str_replace(".", "", $request->biaya),
                'tujuan_pembiayaan' => $request->tujuan_pembiayaan,
                'akad' => $request->akad,
                'repayment_id' => $request->repayment_id,
                'status_kelompok_id' => $request->status_kelompok_id,
                'status_tempat_tinggal_id' => $request->status_tempat_tinggal_id,
                'frekuensi_pembayaran' => $request->frekuensi_pembayaran,
                'ultra_mikro_nasabah_id' => $id,
                'penghasilan' => str_replace(".", "", $request->penghasilan),
                'pengeluaran' => str_replace(".", "", $request->pengeluaran),
                'omset' => str_replace(".", "", $request->omset),
                'belanja_usaha' => str_replace(".", "", $request->belanja_usaha),
                'penghasilan_kotor' => str_replace(".", "", $request->penghasilan_kotor),
                'penghasilan_lain' => str_replace(".", "", $request->penghasilan_lain),
            ]);
        }


        UltraMikroNasabah::create([
            'id' => $id,
            'nama_nasabah' => $request->nama_nasabah,
            'no_ktp' => $request->no_ktp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $tglLahir,
            'usia_saat_pengajuan' => $usiaPengajuan,
            'alamat_ktp' => $request->alamat_ktp,
            'alamat_domisili' => $request->alamat_domisili,
            'no_hp' => str_replace("+62 0", "", $request->no_hp),
            'status_pernikahan' => $request->status_pernikahan,
            'nama_pasangan_nasabah' => $request->nama_pasangan_nasabah,
            'no_ktp_pasangan' => $request->no_ktp_pasangan,
            'jml_tanggungan' => $request->jml_tanggungan,
            'nama_pekerjaan' => $request->nama_pekerjaan,
        ]);


        UltraMikroPembiayaanHistory::create([
            'ultra_mikro_pembiayaan_id' => $id,
            'status_id' => 1,
            'jabatan_id' => 0,
            'divisi_id' => NULL,
            'user_id' => NULL,
        ]);

        return redirect('/')->with('success', 'Pengajuan Ultra Mikro Berhasil Diajukan!');
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
        return view('form::edit');
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
