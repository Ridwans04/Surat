<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Util extends Controller
{
    public function setSession(Request $request)
    {
        $token = $request->token;
        $this->setSession2($token);
        return redirect()->route('beranda.admin');
    }

    public function setSession2($token)
    {
        $id = $this->getIDFromToken($token);
        if ($id != null) {
            $role = $this->getRoleFromID($id);
            $institusi = $this->getInstitusiFromID($id);
            $dataUser = User::all()->find($id);
            if (is_null(Auth::user())) {
                Auth::login($dataUser);
            }
            $sessionData = [
                'token' => $token,
                'role' => $role,
                'institusi' => $institusi,
            ];
        
            session($sessionData);
            // session()->put('token', $token);
            // session()->put('role', $role);
            // session()->put('institusi', $institusi);
        }
    }

    public function makeJWT(array $payload)
    {
        return JWT::encode($payload, env('JWT_SECRET'), env('JWT_ALGO'));
    }

    public function getIDFromToken($token)
    {
        try {
            $data = JWT::decode($token, new Key(env('JWT_SECRET'), env('JWT_ALGO')));
            return $data->surat_id->id;
        } catch (\Throwable $th) {
        }
    }

    public function getRoleFromID(string $id)
    {
        $dataRole = DB::table('master_role')->join('user_role', 'master_role.id', '=', 'user_role.role_id')->where('user_role.user_id', $id)->get()->toArray();
        $role = [];
        foreach ($dataRole as $key => $value) {
            array_push($role, $value->role);
        }
        return $role;
    }

    public function getInstitusiFromID(string $id)
    {
        $dataRole = DB::table('master_institusi')->join('user_institusi', 'master_institusi.id', '=', 'user_institusi.institusi_id')->where('user_institusi.user_id', $id)->get()->toArray();
        $role = [];
        foreach ($dataRole as $key => $value) {
            array_push($role, $value->role_name);
        }
        return $role;
    }

    public function changeTheme(Request $request)
    {
        $theme = $request->input('theme');
        session()->put('theme', $theme);
        return response()->json(['status' => 'success'], 200);
    }

    public function apiGuzzleClient(string $method, string $url, array $header = [], $body = null)
    {
        $client = new Client();
        if (is_array($body)) {
            $request = $client->request($method, $url, [
                'headers' => $header,
                'form_params' => $body,
            ]);
            $res = $request;
        } else {
            $request = new Psr7Request($method, $url, $header, $body);
            $res = $client->sendAsync($request)->wait();
        }
        return $res;
    }

    public function saveTokenGoogle($id, string $token)
    {
        $user = User::all()->find($id);
        $user->token_google = $token;
        return $user->save();
    }
}
