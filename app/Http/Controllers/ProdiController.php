<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Fakultas;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::with('fakultas')->get();
        $fakultas = Fakultas::all();
        return view('admin.prodi', compact('prodis', 'fakultas'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        return view('admin.prodi-create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:prodi,id',
            'nama_prodi' => 'required',
            'id_fakultas' => 'required',
        ]);

        Prodi::create([
            'id' => $request->input('id'),
            'nama_prodi' => $request->input('nama_prodi'),
            'id_fakultas' => $request->input('id_fakultas'),
        ]);

        return redirect()->route('admin.prodi');
    }

    public function edit($id)
    {
        $prodi = Prodi::findOrFail($id);
        $fakultas = Fakultas::all();
        return view('admin.prodi-edit', compact('prodi', 'fakultas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'id_fakultas' => 'required',
        ]);

        $prodi = Prodi::findOrFail($id);
        $prodi->update([
            'nama_prodi' => $request->input('nama_prodi'),
            'id_fakultas' => $request->input('id_fakultas'),
        ]);

        return redirect()->route('admin.prodi');
    }

    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        return redirect()->route('admin.prodi')->with('success', 'Prodi deleted successfully');
    }
}
