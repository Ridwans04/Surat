<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\master\master_role;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class master_roleController extends Controller
{
    public function index()
    {
        $data = master_role::all()->toArray();
        
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = new master_role();
        $data->role = str_replace(" ", "_", $request->role);
        if($data->save()){
            return response()->json(['status' => 'success'], 200);
        }
        return response()->json(['status' => "failed"], 400); 
    }

    public function show($id_data)
    {
        $id = $id_data;
        $data = master_role::where('id', $id)->first();
        if(!$data || is_null($data)){
            return response()->json(['status' => 'failed'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $data->toArray()], 200);
    }

    public function update(Request $request, $id_data)
    {
        // dd($request->all());
        $id = $id_data;
        $data = master_role::where('id', $id)->first();
        $data->role = str_replace(" ", "_", $request->nama_role);
        if($data->save()){
            return response()->json(['status' => 'success'], 200);
        }
        return response()->json(['status' => "failed"], 400); 
    }

    public function destroy($id)
    {
        
    }
}
