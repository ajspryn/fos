<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\AdminActivityLog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $users = Role::rightJoin('users', 'roles.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.email', 'roles.role_id', 'roles.divisi_id', 'roles.jabatan_id')
            ->when($search, fn($q) => $q->where(
                fn($q2) => $q2
                    ->where('users.name', 'like', "%{$search}%")
                    ->orWhere('users.email', 'like', "%{$search}%")
            ))
            ->orderBy('users.id')
            ->paginate(15)
            ->withQueryString();

        $roleLabels = [
            0 => 'Nasabah',
            1 => 'Admin',
            2 => 'User',
        ];
        $divisiLabels = [
            0 => 'Admin',
            1 => 'SKPD',
            2 => 'Pasar',
            3 => 'UMKM',
            4 => 'PPR',
            5 => 'Custodian',
            6 => 'PPPK',
            7 => 'Ultra Mikro',
        ];
        $jabatanLabels = [
            0 => 'Admin',
            1 => 'Staff/AO',
            2 => 'Kabag',
            3 => 'Analis',
            4 => 'Direktur Bisnis',
            5 => 'Direktur Utama',
        ];

        // All users for the "assign role" form dropdown (not paginated)
        $allUsers = User::orderBy('name')->get();

        return view('admin::user.index', compact('users', 'allUsers', 'roleLabels', 'divisiLabels', 'jabatanLabels'));
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
    public function show($id) {}

    /**
     * Update user profile data (name, email, password).
     */
    public function updateProfile(Request $request, $id)
    {
        $rules = [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ];
        if ($request->filled('password')) {
            $rules['password']         = 'min:8|confirmed';
            $rules['password_confirmation'] = 'required';
        }
        $request->validate($rules);

        $user = User::findOrFail($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'Data karyawan berhasil diperbarui!');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        // $user = User::select()->where('id', $id)->first();
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

    /**
     * Reset password user oleh admin.
     */
    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'new_password'              => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->password = bcrypt($request->new_password);
        $user->save();
        AdminActivityLog::log('reset_password', 'User', "Reset password untuk {$user->name} (ID={$user->id})");

        return redirect()->back()->with('success', 'Password ' . $user->name . ' berhasil direset!');
    }

    /**
     * Toggle aktif/nonaktif user (via email_verified_at).
     */
    public function toggleAktif($id)
    {
        $user = User::findOrFail($id);
        if ($user->email_verified_at) {
            $user->email_verified_at = null;
            $msg = $user->name . ' berhasil dinonaktifkan.';
        } else {
            $user->email_verified_at = now();
            $msg = $user->name . ' berhasil diaktifkan.';
        }
        $user->save();
        AdminActivityLog::log('toggle_aktif', 'User', $msg);

        return redirect()->back()->with('success', $msg);
    }
}
