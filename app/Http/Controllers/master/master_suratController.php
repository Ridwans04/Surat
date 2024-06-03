<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\master\master_surat;
use Illuminate\Http\Request;

class master_suratController extends Controller
{
    public function index()
    {
        $data = master_surat::all()->toArray();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = new master_surat();
        $data->nama_surat = $request->surat;
        if($data->save()){
            return response()->json(['status' => 'success'], 200);
        }
        return response()->json(['status' => "failed"], 400); 
    }

    public function show($id_data)
    {
        $id = $id_data;
        $data = master_surat::where('id', $id)->first();
        if(!$data || is_null($data)){
            return response()->json(['status' => 'failed'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $data->toArray()], 200);
    }

    public function update(Request $request, $id_data)
    {
        $id = $id_data;
        $data = master_surat::where('id', $id)->first();
        $data->nama_surat = $request->nama_surat;
        if($data->save()){
            return response()->json(['status' => 'success'], 200);
        }
        return response()->json(['status' => "failed"], 400); 
    }

    public function destroy($id)
    {
        //
    }
}
