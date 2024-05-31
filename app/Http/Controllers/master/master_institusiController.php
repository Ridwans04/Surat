<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\master\master_institusi;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class master_institusiController extends Controller
{
    public function index()
    {
        $data = master_institusi::all()->toArray();

        return response()->json([
            'data' => $data,
            'status' => 'success',
        ]);
    }

    public function store(Request $request)
    {
        $data = new master_institusi();
        $data->nama_institusi = strtoupper($request->nama_institusi);
        $data->initial_institusi = str_replace(" ", "_", strtoupper($request->nama_institusi));
        if ($data->save()) {
            return response()->json(['status' => 'success'], 200);
        }
        return response()->json(['status' => 'failed'], 400);
    }

    public function show($id_ins)
    {
        $id = $id_ins;
        $data = master_institusi::find($id);
        if(!$data || is_null($data)){
            return response()->json(['status' => 'failed'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $data->toArray()], 200);
    }

    public function update($id_ins, Request $request)
    {
        $id = $id_ins;
        $data = master_institusi::where('id', $id)->first();
        $data->nama_institusi = $request->nama_institusi;
        $data->initial_institusi = $request->initial_institusi;
        $data->save();
        return response()->json([
           'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
