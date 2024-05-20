<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class google_authController extends Controller
{
    protected $util;
    public function __construct()
    {
        $this->util = new Util();
    }

    public function redirectGoogle()
    {
        $url = Socialite::driver('google')->redirect()->getTargetUrl();
        // return redirect($url . '&prompt=select_account');
        return redirect($url);
    }

    public function callback(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            $token = $user->token;
            $findUser = DB::connection('sdm')->table('pegawai')->where('email_k', '=', $user->getEmail())->first();
            if (is_null($findUser)) {
                $res = $this->util->apiGuzzleClient('POST', env('GOOGLE_REVOKE') . "?token=$token");
                return redirect()->route('login')->with('user_not_found', 'Pengguna Tidak Terdaftar');
            }
            $dataCheck = User::all()
                ->where('id_sdm', '=', $findUser->id)
                ->first();
            if (is_null($dataCheck)) {
                $id = $findUser->id;
                $email = $findUser->email_k;
                $nama = $user->getName();
                $nip = $findUser->nip;
                if (!str_contains($email, '@raudlatuljannah')) {
                    $res = $this->util->apiGuzzleClient('POST', env('GOOGLE_REVOKE') . "?token=$token");
                    return redirect()->route('login')->with('user_not_found', 'Pengguna Tidak Terdaftar');
                }
                $user = new user();
                $user->username = strtoupper($nama);
                $user->id_sdm = $id;
                $user->nip = $nip;
                $user->password = Hash::make('123456');
                $user->save();
            }
            $dataCheck = User::all()
                ->where('id_sdm', '=', $findUser->id)
                ->first();
            Auth::login($dataCheck);
            $this->util->saveTokenGoogle($dataCheck->id, $token);
            $payload = [
                'sub' => 'User',
                'surat_id' => [
                    'id' => $dataCheck->id,
                ],
                'iss' => 'E-Surat RaudlLatul Jannah',
                'exp' => time() + env('TIME_EXPIRATION'),
            ];
            $jwt = $this->util->makeJWT($payload);
            $this->util->setSession2($jwt);
            $role = session('role');
            $adminRoles = ["super_admin", "admin"];
            switch (true) {
                case array_intersect($role, $adminRoles):
                    return redirect()->route('beranda.admin');
                    break;
                case $role === 'pj':
                    return redirect()->route('beranda.pj');
                    break;
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
