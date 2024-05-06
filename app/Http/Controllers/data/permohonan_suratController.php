<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\master\master_sub_institusi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class permohonan_suratController extends Controller
{
    public function permohonan_surat()
    {
        $pageConfigs = [
            'pageHeader' => true,
            'contentLayout' => "content-left-sidebar",
            'pageClass' => 'email-application',
        ];
        $pj = User::where('level', 'PJ')->get();
        

        return view('content.permohonan_surat.data', compact('pageConfigs', 'pj'));
    }

    public function get_ins(Request $request)
    {
        $ins = $request->ins;
        $sub_ins = master_sub_institusi::where('asal_institusi', $ins)->get();

        return response()->json([
            'success' => true,
            'data' => $sub_ins
        ]);
    }

    public function get_list_pj(Request $request)
    {
        $ins = $request->ins;
        $pj = User::where('institusi', $ins)->where('level', 'pj')->get();

        return response()->json([
            'success' => true,
            'data' => $pj
        ]);
    }

    public function add_req_surat(Request $request)
    {
        $data = $request->all();

        return response()->json([
            'success' => $data
        ]);
    }
}
