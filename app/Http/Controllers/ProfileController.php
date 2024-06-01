<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profileAdmin(Request $request)
    {
        $user = User::query()->where('nrp', Auth::user()['nrp'])->get();
        return Response()->view('admin.profile', ['user' => $user[0]]);
    }

    public function profileProdi(Request $request)
    {
        $user = User::query()->where('nrp', Auth::user()['nrp'])->get();
        return Response()->view('prodi.profile', ['user' => $user[0]]);
    }
    public function profileUser()
    {
        return Response()->view('user.profile');
    }

}
