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
            if ($role->divisi_id==1) {
                $url='/admin';
            }
            if ($role->divisi_id==2) {
                $url='/skpd';
            }
        }

        return Redirect($url);
    }
}
