<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Form\Entities\SkpdPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaan;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_debitur = SkpdPembiayaan::select(DB::raw('count(skpd_instansi_id) as instansi, skpd_instansi_id,sum(nominal_pembiayaan) as plafond,count(skpd_nasabah_id) as noa'))->join('skpd_instansis', 'skpd_pembiayaans.skpd_instansi_id', '=', 'skpd_instansis.id')->where('user_id', Auth::user()->id)->groupBy('skpd_instansi_id')->orderBy('plafond', 'desc')->get();
        $data_debitur_pasar = PasarPembiayaan::join('pasar_keterangan_usahas', 'pasar_pembiayaans.id', '=', 'pasar_keterangan_usahas.pasar_pembiayaan_id')->select(DB::raw('count(jenispasar_id) as pasar, jenispasar_id, sum(harga) as plafond,count(nasabah_id) as noa'))->join('pasar_jenis_pasars', 'pasar_keterangan_usahas.jenispasar_id', '=', 'pasar_jenis_pasars.id')->where('AO_id', Auth::user()->id)->groupBy('jenispasar_id')->orderBy('plafond', 'desc')->get();
        $dataNasabahPpr = FormPprPembiayaan::join('form_ppr_data_agunans', 'form_ppr_pembiayaans.id', '=', 'form_ppr_data_agunans.form_ppr_pembiayaan_id')->select(DB::raw('count(form_agunan_1_nama_proyek_perumahan) as proyek_perumahan, form_agunan_1_nama_proyek_perumahan,sum(form_permohonan_nilai_ppr_dimohon) as plafond,count(form_ppr_data_pribadi_id) as noa'))->where('user_id', Auth::user()->id)->groupBy('form_agunan_1_nama_proyek_perumahan')->orderBy('plafond', 'desc')->get();

        // return $data_debitur_pasar;
        return view('profile', [
            'role' => Role::select()->where('user_id', Auth::user()->id)->get()->first(),
            'user' => User::select()->where('id', Auth::user()->id)->get()->first(),
            'data_debiturs' => $data_debitur,
            'data_debitur_pasars' => $data_debitur_pasar,
            'dataNasabahPprs' => $dataNasabahPpr,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->code == 1) {
            User::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            return redirect()->back()->with('success', 'Data Diri Berhasil Diubah');
        } elseif ($request->code == 2) {
            User::where('id', $id)
                ->update([
                    'password' => Hash::make($request->password_baru)
                ]);
            return redirect()->back()->with('success', 'Password Berhasil Diubah');
        } elseif ($request->code == 3) {
            // ddd($request->file('foto'));
            // return $request;
            if ($request->file('foto')) {
                if ($request->foto_lama) {
                    Storage::delete($request->foto_lama);
                }
                $input = $request->file('foto')->store('foto-profile');
                User::where('id', $id)
                    ->update([
                        'foto' => $input,
                    ]);
            }
            return redirect()->back()->with('success', 'Foto Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
