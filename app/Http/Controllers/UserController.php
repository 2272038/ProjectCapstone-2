<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Prodi;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUsers(User $users)
    {
        $getRole = Role::select(['id', 'name'])->get();
        $users = User::select(['nrp', 'name', 'email', 'role_id', 'prodi_id'])->get();
        $getProdi = Prodi::select(['id', 'nama_prodi','id_fakultas'])->get();
        return Response()->view('admin.user', ['users' => $users, 'getRole' => $getRole, 'getProdi' => $getProdi]);
    }

    public function addUsers(Request $request)
    {
        $existingNrp = User::where('nrp', $request->input('nrp'))->first();
        $existingEmail = User::where('email', $request->input('email'))->first();

        if ($existingNrp) {
            return back()->withInput()->withErrors(['error' => 'NRP sudah ada']);
        } elseif ($existingEmail) {
            return back()->withInput()->withErrors(['error' => 'Email sudah ada']);
        } else {
            User::create([
                'nrp' => $request->input('nrp'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make('12345678'), // default password
                'role_id' => $request->input('role_id'),
                'prodi_id' => $request->input('prodi_id'), // added prodi_id
            ]);
        }

        return redirect('/admin/user');
    }

    public function edit(Request $request, $nrp)
    {
        $user = User::where('nrp', $nrp)->get();
        $getRole = Role::select(['id', 'name'])->get();
        $getProdi = Prodi::select(['id', 'nama_prodi','id_fakultas'])->get();
        return view('admin.user-edit', ['users' => $user[0], 'getRole' => $getRole, 'getProdi' => $getProdi]);
    }

    public function editUser(Request $request, $nrp)
    {
        $request->validate([
            'nrp' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'prodi_id' => 'required',
        ]);

        User::where('nrp', $nrp)->update([
            'nrp' => $request->input('nrp'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
            'prodi_id' => $request->input('prodi_id'),
        ]);

        return redirect()->route('admin-users')->with('success', 'User updated successfully');
    }

    public function deleteUser(Request $request, $nrp)
    {
        $user = User::where('nrp', $nrp)->first();

        if (!$user) {
            return redirect()->route('admin-users')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('admin-users')->with('success', 'User deleted successfully');
    }
}
