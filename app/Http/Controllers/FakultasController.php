<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;

class FakultasController extends Controller
{
    public function getFakultas(Fakultas $fakultas)
    {
        $fakultas = Fakultas::select(['id', 'nama_fakultas'])->get();
        return Response()->view('admin.fakultas', ['fakultas' => $fakultas]);
    }

    public function addFakultas(Request $request)
    {
        $existingFakultas = Fakultas::where('nama_fakultas', $request->input('nama_fakultas'))->first();

        if ($existingFakultas) {
            return back()->withInput()->withErrors(['error' => 'Fakultas sudah ada']);
        } else {
            Fakultas::create([
                'nama_fakultas' => $request->input('nama_fakultas'),
            ]);
        }

        return redirect('/admin/fakultas');
    }

    public function editFakultas(Request $request, $id)
    {
        $fakultas = Fakultas::where('id', $id)->get();
        return view('admin.fakultas-edit', ['fakultas' => $fakultas[0]]);
    }

    public function updateFakultas(Request $request, $id)
    {
        $request->validate([
            'nama_fakultas' => 'required',
        ]);

        Fakultas::where('id', $id)->update([
            'nama_fakultas' => $request->input('nama_fakultas'),
        ]);

        return redirect()->route('admin-fakultas');
    }

    public function deleteFakultas(Request $request, $id)
    {
        $fakultas = Fakultas::where('id', $id)->first();

        if (!$fakultas) {
            return redirect()->route('admin-fakultas')->with('error', 'Fakultas not found');
        }

        $fakultas->delete();

        return redirect()->route('admin-fakultas')->with('success', 'Fakultas deleted successfully');
    }
}
