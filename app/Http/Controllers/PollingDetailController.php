<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\PollingDetail;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;

class PollingDetailController extends Controller
{

    public function getPolDetail(Request $request, $id)
    {
        $pollings = Polling::select(['id', 'poll_name', 'prodi_id'])->where('id', $id)->first();
        $getUser = User::select(['nrp'])->get();
        $getMatkul = MataKuliah::select(['id', 'nama_mata_kuliah', 'prodi_id'])
            ->where('prodi_id', $pollings->prodi_id)
            ->get();
        $getProdi = Prodi::select(['id', 'nama_prodi'])->get();
        $jPolls = [];
        foreach ($getMatkul as $GM) {
            $jPoll = PollingDetail::where('polling_id', $id)
                ->where('mata_kuliah_id', $GM->id)
                ->where('prodi_id', $pollings->prodi_id)
                ->count();
            $jPolls[$GM->id] = $jPoll;
        }
        return response()->view('prodi.create-polling-view', [
            'pollings' => $pollings,
            'getMatkul' => $getMatkul,
            'getUser' => $getUser,
            'getProdi' => $getProdi,
            'jPolls' => $jPolls,
        ]);
    }

    public function getPolDetailUser()
    {
        $getUser = user::select(['nrp'])->get();
        $getMatkul = MataKuliah::select(['id', 'nama_mata_kuliah'])->get();
        $pollings = Polling::select(['id','poll_name','end_date', 'prodi_id'])->get();
        $getProdi = Prodi::select(['id','nama_prodi'])->get();

        return Response()->view('user.polling-view',
            ['pollings' => $pollings,
                'getMatkul' => $getMatkul,
                'getUser' => $getUser,
                'getProdi' => $getProdi]);
    }

    public function getVoteUser(Request $request, $id)
    {
        $pollings = Polling::select(['id', 'poll_name', 'prodi_id'])->where('id', $id)->first();
        $getMatkul = MataKuliah::select(['id', 'nama_mata_kuliah', 'prodi_id', 'sks', 'kurikulum_id'])
            ->where('prodi_id', $pollings->prodi_id)
            ->get();
        $getProdi = Prodi::select(['id', 'nama_prodi'])->get();

        return response()->view('user.user-vote-polling', [
            'pollings' => $pollings,
            'getMatkul' => $getMatkul,
            'getProdi' => $getProdi,
        ]);
    }

    public function SubmitVoteUser(Request $request, $id)
    {
        $selectedValues = $request->input('selectedValues');
        $getMatkul = MataKuliah::select(['id', 'nama_mata_kuliah', 'prodi_id', 'sks', 'kurikulum_id'])
            ->get();
        foreach ($selectedValues as $p) {
            foreach ($getMatkul as $matkul) {
                if ($p == $matkul['id']) {
                    PollingDetail::create([
                        'polling_id' => $id,
                        'mata_kuliah_id' => $matkul->id,
                        'user_nrp' => Auth::user()->nrp,
                        'prodi_id' => $matkul->prodi_id
                    ]);
                }
            }
        }
        return redirect()->route('user-polling-detail');
    }

    public function deletePollingDetail(Request $request, PollingDetail $pollingDetail, $id)
    {
        $pollingDetail = PollingDetail::where('id', '=', $id);
        $pollingDetail->delete();

        return redirect()->route('prodi-polling-detail', ['pollingId' => $pollingDetail->polling_id]);
    }
}
