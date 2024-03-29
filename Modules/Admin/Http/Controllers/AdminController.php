<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $role=Role::select()->where('user_id',Auth::user()->id)->get()->first();
        $user=Role::Rightjoin('users','roles.user_id','=','users.id')->select()->whereNull('role_id')->get()->count();
        $userlengkap=Role::Rightjoin('users','roles.user_id','=','users.id')->select()->get()->count();
        // dd($role->role_id);
        return view('admin::lihat',[
            // 'header'=>"Dashboard Admin",
            'title'=>"Dashboard Admin",
            'role'=>$role->role_id,
            'user'=>User::select()->where('id', Auth::user()->id)->get()->first(),
            'usertidakadarole'=>$user,
            'userlengkap'=>$userlengkap,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
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
