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
        return redirect($url . '&prompt=select_account');
    }

    public function callback(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            $token = $user->token;
            $finduser = DB::connection('sdm')->table('pegawai')->where('email_k', '=', $user->getEmail())->first();
            dd($finduser);
            if (is_null($finduser)) {
                $res = $this->util->apiGuzzleClient('POST', env('GOOGLE_REVOKE') . "?token=$token");
                return redirect()->route('login')->with('user_not_found', 'Pengguna Tidak Terdaftar');
            }
            $dataCheck = User::all()
                ->where('id_sdm', '=', $finduser->id)
                ->first();
            if (is_null($dataCheck)) {
                $id = $finduser->id;
                $email = $finduser->email_k;
                $nama = $finduser->nama;
                $nip = $finduser->nip;
                if (!str_contains($email, '@raudlatuljannah')) {
                    $res = $this->util->apiGuzzleClient('POST', env('GOOGLE_REVOKE') . "?token=$token");
                    return redirect()->route('login')->with('user_not_found', 'Pengguna Tidak Terdaftar');
                }
                $user = new user();
                $user->name = strtoupper($nama);
                $user->id_pegawai_sdm = $id;
                $user->nip = $nip;
                $user->password = Hash::make('luhurbudi');
                $user->save();
            }
            $dataCheck = User::all()
                ->where('id_pegawai', '=', $finduser->id)
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
            return redirect()->route('dashboard');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
