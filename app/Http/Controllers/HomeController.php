<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role=Role::select()->where('user_id',Auth::user()->id)->get()->first();
        $url='/';

        if ($role){
            if ($role->divisi_id==0) {
                if ($role->jabatan_id==0){
                    $url='/admin';
                }
                elseif ($role->jabatan_id==2){
                    $url='/kabag';
                }
                elseif ($role->jabatan_id==3){
                    $url='/analis';
                }
                elseif ($role->jabatan_id==4){
                    $url='/dirbis';
                }
                else{
                    $url='/';
                }
            }
            elseif ($role->divisi_id==1) {
                    $url='/skpd';
            }
            elseif ($role->divisi_id==2) {
                    $url='/pasar';
            }
            elseif ($role->divisi_id==3) {
                    $url='/umkm';
            }
            elseif ($role->divisi_id==4) {
                    $url='/ppr';
            }
            else{
                    $url='/';

            }


        }


        return Redirect($url);
    }
}
