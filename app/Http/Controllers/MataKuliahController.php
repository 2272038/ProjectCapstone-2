<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Kurikulum;
use App\Models\User;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function getMataKuliah(MataKuliah $matkul)
    {
        $getProdi = Prodi::all();
        $getNamaKurikulum = Kurikulum::select(['id', 'nama_kurikulum'])->get();
        $matkul = MataKuliah::select(['id','nama_mata_kuliah','kurikulum_id', 'sks'])->get();
        return Response()->view('prodi.mata-kuliah',
            ['matkul' => $matkul,
                'getNamaKurikulum' => $getNamaKurikulum,
                'getProdi' => $getProdi
            ]);
    }

    public function getMataKuliahUser(MataKuliah $matkul)
    {
        $getUser = User::select(['prodi_id'])->get();
        $getProdi = Prodi::select(['id'])->get();
        $getNamaKurikulum = Kurikulum::select(['id', 'nama_kurikulum'])->get();
        $matkul = MataKuliah::select(['id','nama_mata_kuliah','kurikulum_id', 'sks', 'prodi_id'])->get();
        return Response()->view('user.mata-kuliah', ['matkul' => $matkul, 'getNamaKurikulum' => $getNamaKurikulum, 'getProdi' => $getProdi, 'getUser' => $getUser]);
    }

    public function addMataKuliah(Request $request)
    {
        $id_matkul = MataKuliah::where('id', $request->input('id'))->first();
        $nama_matkul = MataKuliah::where('nama_mata_kuliah', $request->input('nama_mata_kuliah'))->first();

        if (!empty($id_matkul)) {
            return back()->withInput()->withErrors(['error' => 'ID Mata Kuliah sudah ada!']);
        } else if (!empty($nama_matkul)) {
            return back()->withInput()->withErrors(['error' => 'Nama Mata Kuliah sudah ada!']);
        } else {
            MataKuliah::create([
                'id' => $request->input('id'),
                'nama_mata_kuliah' => $request->input('nama_mata_kuliah'),
                'kurikulum_id' => $request->input('kurikulum_id'),
                'prodi_id' => $request->input('prodi_id'),
                'sks' => $request->input('sks'),
            ]);
        }

        return redirect('/prodi/mata-kuliah');
    }

    public function edit(Request $request, $id)
    {
        $getUser = User::select(['prodi_id'])->get();
        $getProdi = Prodi::select(['id', 'nama_prodi'])->get();
        $getNamaKurikulum = Kurikulum::select(['id', 'nama_kurikulum'])->get();
        $matkul = MataKuliah::where('id', $id)->get();
        return view('prodi.mata-kuliah-edit',
            ['matkul' => $matkul[0],
                'getUser' => $getUser,
                'getProdi' => $getProdi,
                'getNamaKurikulum' => $getNamaKurikulum,
            ]);
    }

    public function editMatkul(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'nama_mata_kuliah' => 'required',
            'kurikulum_id' => 'required',
            'prodi_id' => 'required',
            'sks' => 'required',
        ]);

        MataKuliah::where('id', $id)->update([
            'id' => $request->input('id'),
            'nama_mata_kuliah' => $request->input('nama_mata_kuliah'),
            'kurikulum_id' => $request->input('kurikulum_id'),
            'prodi_id' => $request->input('prodi_id'),
            'sks' => $request->input('sks'),
        ]);

        return redirect()->route('prodi-mata-kuliah');
    }

    public function deleteMatkul(Request $request, MataKuliah $matkul, $id)
    {
        $matkul = MataKuliah::where('id', '=', $id);
        $matkul->delete();
        return redirect()->route('prodi-mata-kuliah');
    }
}
