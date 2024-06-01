<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUsers(User $users)
    {
        $getRole = Role::select(['id', 'name'])->get();
        $users = User::select(['id','nrp', 'name', 'email', 'role_id'])->get();
        return Response()->view('admin.user', ['users' => $users, 'getRole' => $getRole]);
    }

    public function addUsers(Request $request)
    {
        $nrp = User::where('nrp', $request->input('nrp'))->first();
        $email = User::where('email', $request->input('email'))->first();

        if (!empty($nrp)) {
            return back()->withInput()->withErrors(['error' => 'NRP sudah ada']);
        } else if (!empty($email)) {
            return back()->withInput()->withErrors(['error' => 'Email sudah ada']);
        } else {
            User::create([
                'nrp' => $request->input('nrp'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make('12345678'),
                'role_id' => $request->input('role_id')
            ]);
        }

        return redirect('/admin/user');
    }

    public function edit(Request $request, $id)
    {
        $user = User::where('id', $id)->get();
//        dd($user);
        return view('admin.user-edit', ['users' => $user[0]]);
    }

    public function editUser(Request $request, $id)
    {
        $request->validate([
            'nrp' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
        ]);

      User::where('id', $id)->update([
            'nrp' => $request->input('nrp'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role_id'),
      ]);

        return redirect()->route('admin-users');
    }

    public function deleteUser(Request $request, User $user, $id)
    {
        $user = User::where('id', '=', $id);
        $user->delete();
        return redirect()->route('admin-users');
    }

}
