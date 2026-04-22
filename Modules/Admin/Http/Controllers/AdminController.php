<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\P3k\Entities\P3kPembiayaan;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roleRecord = Role::where('user_id', Auth::user()->id)->first();
        $userTidakAdaRole = Role::rightJoin('users', 'roles.user_id', '=', 'users.id')->whereNull('role_id')->count();
        $userLengkap = User::count();

        return view('admin::lihat', [
            'title'             => 'Dashboard Admin',
            'role'              => optional($roleRecord)->role_id,
            'user'              => Auth::user(),
            'usertidakadarole'  => $userTidakAdaRole,
            'userlengkap'       => $userLengkap,
            'totalPasar'        => PasarPembiayaan::count(),
            'totalSkpd'         => SkpdPembiayaan::count(),
            'totalUmkm'         => UmkmPembiayaan::count(),
            'totalPpr'          => FormPprPembiayaan::count(),
            'totalP3k'          => P3kPembiayaan::count(),
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
    public function store(Request $request) {}

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
