<?php

namespace App\Http\Controllers;


use App\Models\Polling;
use App\Models\Matakuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;


class PollingController extends Controller
{

    public function getPollings(Polling $pollings)
    {
        $getProdi = Prodi::select(['id', 'nama_prodi'])->get();
        $pollings = Polling::select(['id','poll_name','end_date', 'prodi_id'])->get();
        return Response()->view('prodi.create-polling',
            ['pollings' => $pollings,
            'getProdi' => $getProdi]);

    }

    public function getPollingUser()
    {
        $getProdi = Prodi::select(['id', 'nama_prodi'])->get();
        $pollings = Polling::select(['id','poll_name','end_date', 'prodi_id'])->get();
        return response()->view('user.polling',
            ['pollings' => $pollings,
                'getProdi' => $getProdi]);
    }

    public function addPolling(Request $request)
    {
        $id_polling = Polling::where('id', $request->input('id'))->first();

        if (!empty($id_polling)) {
            return back()->withInput()->withErrors(['error' => 'ID Polling sudah ada!']);
        } else {
            Polling::create([
                'id' => $request->input('id'),
                'poll_name' => $request->input('poll_name'),
                'end_date' => $request->input('end_date'),
                'prodi_id' => $request->input('prodi_id')
            ]);
        }

        return redirect('/prodi/create-polling');
    }

    public function editPoll(Request $request, $id)
    {
        $pollings = Polling::where('id', $id)->get();
        $getProdi = Prodi::select(['id', 'nama_prodi'])->get();

        return view('prodi.create-polling-edit', ['pollings' => $pollings[0]],
            ['getProdi' => $getProdi,]);
    }

    public function editPolling(Request $request, $id)
    {
        $request->validate([
            'poll_name' => 'required',
            'end_date' => 'required',
            'prodi_id' => 'required'
        ]);

        Polling::where('id', $id)->update([
            'id' => $request->input('id'),
            'poll_name' => $request->input('poll_name'),
            'end_date' => $request->input('end_date'),
            'prodi_id' => $request->input('prodi_id')
        ]);

        return redirect()->route('prodi-polling');
    }
    public function deletePolling(Request $request, Polling $pollings, $id)
    {
        $pollings = Polling::where('id', '=', $id);
        $pollings->delete();
        return redirect()->route('prodi-polling');
    }

}
