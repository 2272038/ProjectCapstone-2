<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function indexLogin()
    {
        return Response()->view('login');
    }

    public function indexAdmin()
    {
        return Response()->view('admin.index');
    }

    public function indexProdi()
    {
        return Response()->view('prodi.index');
    }

    public function indexUser()
    {
        return Response()->view('user.index');
    }
    public function userLogin(Request $request)
    {
//        $user = User::where('nrp', $request->input('nrp'))->where('password', $request->input('password'))->first();
        $result = Auth::attempt([
            'nrp' => $request->input('nrp'),
            'password' => $request->input('password')
        ]);

        if ($result) {
            Session::regenerate();
            if (Auth::user()['role_id'] === 1) {
                return redirect('/admin');
            } else if (Auth::user()['role_id'] === 2) {
                return redirect('/prodi');
            }
            return redirect('/user');
        } else {
            return back()->withInput()->withErrors(['error' => 'Password salah']);
        }
    }

    public function logout(User $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
