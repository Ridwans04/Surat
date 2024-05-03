<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\master\master_surat;
use Illuminate\Http\Request;

class master_suratController extends Controller
{
    public function get_data_surat()
    {
        $data = master_surat::all();
        return response()->json([
            'success'   =>true,
            'data' => $data
        ]);
    }

    public function add_surat(Request $request)
    {
        $surat = $request->input('nm_surat');

        master_surat::create([
            'nama_surat' => $surat,
            'status' => 'aktif',
        ]);
        return response()->json(['success' => true]);
    }

    public function update_surat(Request $request)
    {
        $id = $request->input('id');
        $surat = $request->input('nama_surat');
        $status = $request->input('status');

        $data = master_surat::find($id);
        $data->nama_surat  = $surat;
        $data->status      = $status;
        $data->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function hapus_surat(Request $request)
    {
        $id = $request->id;
        master_surat::find($id)->delete();
        return response()->json([
            'success'   => true
        ]);
    }
}
