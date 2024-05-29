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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_ins, Request $request)
    {
        $id = $id_ins;
        $data = master_institusi::find($id);
        if(!$data || is_null($data)){
            return response()->json(['status' => 'failed'], 404);
        }
        dd($data);
        return response()->json(['status' => 'success', 'data' => $data->toArray()], 200);
    }

    public function update(Request $request, $id)
    {
        //
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
