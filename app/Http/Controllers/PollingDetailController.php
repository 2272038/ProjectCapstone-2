<?php

namespace App\Http\Controllers;

use App\Models\PollingDetail;
use Illuminate\Http\Request;

class PollingDetailController extends Controller
{
    public function getPollingDetail($pollingId)
    {
        $pollingDetail = PollingDetail::where('polling_id', $pollingId)->get();

        // Pass the polling detail data to the view
        return view('prodi.polling-detail', ['pollingDetail' => $pollingDetail]);
    }

    public function deletePollingDetail(Request $request, PollingDetail $pollingDetail, $id)
    {
        $pollingDetail = PollingDetail::where('id', '=', $id);
        $pollingDetail->delete();

        return redirect()->route('prodi-polling-detail', ['pollingId' => $pollingDetail->polling_id]);
    }
}
