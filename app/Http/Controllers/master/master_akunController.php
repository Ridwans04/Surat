<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class master_akunController extends Controller
{
    public function get_data_akun()
    {
        $data = User::all();

        return response([
            'data' => $data,
            'success' => true
        ]);
    }

    public function add_akun(Request $request)
    {
        $username = $request->input('username');
        $level = $request->input('level');
        $institusi = $request->input('institusi');
        $password = Hash::make($request->input('password'));

        User::create([
            'username' => $username,
            'level' => $level,
            'institusi' => $institusi,
            'password' => $password
        ]);
        return response()->json(['success' => true]);
    }

    public function update_akun(Request $request)
    {
        $id = $request->input('id');
        $user = $request->input('user');
        $lvl = $request->input('lvl');
        $ins = $request->input('ins');
        $pass = $request->input('pass');

        $data = User::find($id);
        $data->username  = $user;
        $data->level     = $lvl;
        $data->institusi = $ins;
        if($pass){
            $data->password  = $pass;
        }
        $data->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function hapus_akun(Request $request)
    {
        $id = $request->id;
        User::find($id)->delete();
        return response()->json([
            'success'   => true
        ]);
    }
}
