<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBeasiswa;

class JeBecontroller extends Controller
{
    public function getJenisBeasiswa()
    {
        $jenisBeasiswas = JenisBeasiswa::select(['id', 'nama-beasiswa'])->get();
        return view('admin.jenis_beasiswa', ['jenisBeasiswas' => $jenisBeasiswas]);
    }

    public function addJenisBeasiswa(Request $request)
    {
        $existingJenisBeasiswa = JenisBeasiswa::where('nama-beasiswa', $request->input('nama-beasiswa'))->first();

        if ($existingJenisBeasiswa) {
            return back()->withInput()->withErrors(['error' => 'Jenis Beasiswa sudah ada']);
        } else {
            JenisBeasiswa::create([
                'nama-beasiswa' => $request->input('nama-beasiswa'),
            ]);
        }

        return redirect('/admin/jenis_beasiswa');
    }

    public function editJenisBeasiswa($id)
    {
        $jenisBeasiswa = JenisBeasiswa::where('id', $id)->first();
        return view('admin.jenis_beasiswa-edit', ['jenisBeasiswa' => $jenisBeasiswa]);
    }

    public function updateJenisBeasiswa(Request $request, $id)
    {
        $request->validate([
            'nama-beasiswa' => 'required',
        ]);

        JenisBeasiswa::where('id', $id)->update([
            'nama-beasiswa' => $request->input('nama-beasiswa'),
        ]);

        return redirect()->route('admin-jenis_beasiswa');
    }

    public function deleteJenisBeasiswa($id)
    {
        $jenisBeasiswa = JenisBeasiswa::where('id', $id)->first();

        if (!$jenisBeasiswa) {
            return redirect()->route('admin-jenis_beasiswa')->with('error', 'Jenis Beasiswa not found');
        }

        $jenisBeasiswa->delete();

        return redirect()->route('admin-jenis_beasiswa')->with('success', 'Jenis Beasiswa deleted successfully');
    }
}
