<?php

namespace App\Http\Controllers;


use App\Models\Polling;
use App\Models\Matakuliah;
use Illuminate\Http\Request;


class PollingController extends Controller
{

    public function getPollings(Polling $pollings)
    {
        $getNamaMataKuliah = Matakuliah::select(['id', 'nama_mata_kuliah'])->get();
        $getSKSMataKuliah = Matakuliah::select(['id', 'sks'])->get();
        $pollings = Polling::select(['polling_id','polling_date','matakuliah_id'])->get();
        return Response()->view('prodi.create-polling',
            ['pollings' => $pollings,
            'getNamaMataKuliah' => $getNamaMataKuliah,
            'getSKSMataKuliah' => $getSKSMataKuliah]);

    }

    public function getPollingsusers(Polling $pollings)
    {
        $getNamaMataKuliah = Matakuliah::select(['id', 'nama_mata_kuliah'])->get();
        $getSKSMataKuliah = Matakuliah::select(['id', 'sks'])->get();
        $pollings = Polling::select(['polling_id','polling_date','matakuliah_id'])->get();
        return Response()->view('prodi.create-polling',
            ['pollings' => $pollings,
                'getNamaMataKuliah' => $getNamaMataKuliah,
                'getSKSMataKuliah' => $getSKSMataKuliah]);

    }


    public function addPolling(Request $request)
    {
        $id_polling = Polling::where('polling_id', $request->input('polling_id'))->first();

        if (!empty($id_polling)) {
            return back()->withInput()->withErrors(['error' => 'ID Polling sudah ada!']);
        } else {
            Polling::create([
                'polling_id' => $request->input('polling_id'),
                'polling_date' => $request->input('polling_date'),
                'matakuliah_id' => $request->input('matakuliah_id')
            ]);
        }

        return redirect('/prodi/create-polling');
    }

    public function editPoll(Request $request, $id)
    {
        $pollings = Polling::where('polling_id', $id)->get();
        $getNamaMataKuliah = Matakuliah::select(['id', 'nama_mata_kuliah'])->get();

        return view('prodi.create-polling-edit', ['pollings' => $pollings[0]],
            ['getNamaMataKuliah' => $getNamaMataKuliah,]);
    }

    public function editPolling(Request $request, $id)
    {
        $request->validate([
            'polling_id' => 'required',
            'polling_date' => 'required',
            'matakuliah_id' => 'required'
        ]);

        Polling::where('polling_id', $id)->update([
            'polling_id' => $request->input('polling_id'),
            'polling_date' => $request->input('polling_date'),
            'matakuliah_id' => $request->input('matakuliah_id')
        ]);

        return redirect()->route('prodi-polling');
    }
    public function deletePolling(Request $request, Polling $pollings, $id)
    {
        $pollings = Polling::where('polling_id', '=', $id);
        $pollings->delete();
        return redirect()->route('prodi-polling');
    }
}
