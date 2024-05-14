<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Util extends Controller
{
    public function setSession(Request $request)
    {
        $token = $request->token;
        $data = $this->getDataFromToken($token);
        switch ($data->role) {
            case 'admin':
                $user = User::all()->find($data->id);
                break;
            case 'pegawai':
                $user = DB::connection('sdm')
                        ->table('pegawai')
                        ->find($data->id);
                break;

            default:
                null;
                break;
        }
        
        if ($data->id != null) {
            session()->put('token', $token);
            // MENGAMBIL USERNAME DARI DATA TOKEN
            switch ($data->role) {
                case 'admin':
                    session()->put('user', $user->username);
                    session()->put('nama', $user->nama);
                    session()->put('jenjang', $user->jenjang);
                    break;
                case 'pegawai':
                    session()->put('user', $user->nama);
                    session()->put('jenjang', $user->jenjang);
                    break;
    
                default:
                    null;
                    break;
            }
            
        }
        return redirect()->route('beranda');  
    }

    public function makeJWT(array $payload)
    {
        return JWT::encode($payload, env('JWT_SECRET'), env('JWT_ALGO'));
    }
}
