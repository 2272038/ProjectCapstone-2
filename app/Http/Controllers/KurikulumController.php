<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function getKurikulum(Kurikulum $kurikulum): \Illuminate\Http\Response
    {
        $getKurikulum = Kurikulum::select(['id', 'nama_kurikulum'])->get();
        return Response()->view('prodi.kurikulum', ['getKurikulum' => $getKurikulum]);
    }

    public function getKurikulumUser(Kurikulum $kurikulum)
    {
        $getKurikulum = Kurikulum::select(['id', 'nama_kurikulum'])->get();
        return Response()->view('user.kurikulum', ['getKurikulum' => $getKurikulum]);
    }

    public function addKurikulum(Request $request)
    {
        $nama_kurikulum = Kurikulum::where('nama_kurikulum', $request->input('nama_kurikulum'))->first();

        if (!empty($nama_kurikulum)) {
            return back()->withInput()->withErrors(['error' => 'Nama Kurikulum sudah ada!']);
        } else {
            Kurikulum::create([
                'nama_kurikulum' => $request->input('nama_kurikulum'),
            ]);
        }

        return redirect('/prodi/kurikulum');
    }

    public function edit(Request $request, $id)
    {
        $kurikulum = Kurikulum::where('id', $id)->get();
        return view('prodi.kurikulum-edit', ['kurikulum' => $kurikulum[0]]);
    }

    public function editKurikulum(Request $request, $id)
    {
        $request->validate([
            'nama_kurikulum' => 'required',
        ]);

        Kurikulum::where('id', $id)->update([
            'nama_kurikulum' => $request->input('nama_kurikulum'),
        ]);

        return redirect()->route('prodi-kurikulum');
    }

    public function deleteKurikulum(Request $request, Kurikulum $kurikulum, $id)
    {
        $kurikulum = Kurikulum::where('id', '=', $id);
        $kurikulum->delete();
        return redirect()->route('prodi-kurikulum');
    }
}
