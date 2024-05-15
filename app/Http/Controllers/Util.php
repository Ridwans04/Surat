<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Util extends Controller
{
    public function setSession(Request $request)
    {
        $token = $request->token;
        $this->setSession2($token);
        return redirect()->route('home'); 
    }

    public function setSession2($token)
    {
        $id = $this->getIDFromToken($token);
        // dd($id);
        if ($id != null) {
            $dataRole = DB::table('master_role')->join('user_role', 'master_role.id', '=', 'user_role.role_id')->where('user_role.user_id', $id)->get()->toArray();
            $role = [];
            foreach ($dataRole as $key => $value) {
                array_push($role, $value->role);
            }
            // $jenjang = $this->getJenjangFromID($id);
            $dataUser = User::all()->find($id);
            if (is_null(Auth::user())) {
                Auth::login($dataUser);
            }
            // session()->put('jenjang', implode('||', $jenjang));
            session()->put('token', $token);
            session()->put('role', $role);
        }
    }

    public function makeJWT(array $payload)
    {
        return JWT::encode($payload, env('JWT_SECRET'), env('JWT_ALGO'));
    }

    public function getIDFromToken($token)
    {
        try {
            $decode = JWT::decode($token, new Key(env('JWT_SECRET'), env('JWT_ALGO')));
            return $decode->surat_id->id;
        } catch (\Throwable $th) {
        }
        try {
            $decode = JWT::decode($token, new Key(env('JWT_SECRET'), env('JWT_ALGO')));
            return $decode->id;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function getRoleFromID(string $id)
    {
        $dataRole = DB::table('master_role')->join('user_role', 'master_role.id', '=', 'user_role.role_id')->where('user_role.user_id', $id)->get()->toArray();
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
}
