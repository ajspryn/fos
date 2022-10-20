<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = Role::Rightjoin('users', 'roles.user_id', '=', 'users.id')->select()->get();
        // return $user;
        return view('admin::user.index', [
            'title' => 'Data User',
            'users' => $user,
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
        $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
            'divisi_id' => 'required',
            'jabatan_id' => 'required',
        ]);

        $input = $request->all();

        Role::create($input);
        return redirect()->back()->with('success', 'Data User Berhasil Ditambahkan!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        // $user = User::select()->where('id', $id)->get()->first();
        // return view('admin::show', [
        //     'user' => $user,
        //     'title' => 'Data User',
        // ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        Role::where('user_id', $id)
            ->update([
                'role_id' => $request->role_id,
                'divisi_id' => $request->divisi_id,
                'jabatan_id' => $request->jabatan_id,
            ]);

        return redirect('/admin/user')->with('success', 'Data User Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Role::select()->where('user_id', $id)->delete();

        return redirect('/admin/user')->with('success', 'Role User Berhasil Dihapus!');
    }
}
