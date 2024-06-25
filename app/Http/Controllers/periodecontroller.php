<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;

class PeriodeController extends Controller
{
    public function getPeriode()
    {
        $periodes = Periode::select(['id', 'semester', 'tahun_akademik'])->get();
        return view('admin.periode', ['periodes' => $periodes]);
    }

    public function addPeriode(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:periode,id',
            'semester' => 'required',
            'tahun_akademik' => 'required',
        ]);

        $existingPeriode = Periode::where('tahun_akademik', $request->input('tahun_akademik'))
            ->where('semester', $request->input('semester'))->first();

        if ($existingPeriode) {
            return back()->withInput()->withErrors(['error' => 'Periode sudah ada']);
        } else {
            Periode::create([
                'id' => $request->input('id'),
                'semester' => $request->input('semester'),
                'tahun_akademik' => $request->input('tahun_akademik'),
            ]);
        }

        return redirect()->route('admin-periode');
    }

    public function editPeriode($id)
    {
        $periode = Periode::findOrFail($id);
        return view('admin.periode-edit', ['periode' => $periode]);
    }

    public function updatePeriode(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required',
            'tahun_akademik' => 'required',
        ]);

        Periode::where('id', $id)->update([
            'semester' => $request->input('semester'),
            'tahun_akademik' => $request->input('tahun_akademik'),
        ]);

        return redirect()->route('admin-periode');
    }

    public function deletePeriode($id)
    {
        $periode = Periode::findOrFail($id);
        $periode->delete();

        return redirect()->route('admin-periode')->with('success', 'Periode deleted successfully');
    }
}
