<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;

class auth_controller extends Controller
{
    protected $util;
    public function __construct()
    {
        $this->util = new Util();
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // MENGAMBIL DATA USERS
        $usersCheck = User::all()
            ->where('username', '=', $request->username)
            ->first();
        // MENGAMBIL DATA PEGAWAI SDM
        $pegawaiCheck = DB::connection('sdm')
            ->table('pegawai')
            ->where('nip', $request->username)
            ->first();

        $key = 'verify:' . $request->ip();

        $maxAttempt = 5;
        if (RateLimiter::tooManyAttempts($key, $maxAttempt)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json(['status' => 'failed', 'message' => 'Sudah Mencoba Terlalu Banyak, Bisa Mencoba Lagi Dalam ' . floor($seconds / 60) . ' Menit ' . $seconds % 60 . ' Detik'], 200);
        }
        $executed = RateLimiter::attempt(
            $key,
            $maxAttempt,
            function () use ($request, $credentials, $usersCheck, $pegawaiCheck, $key, $maxAttempt) {
                if (is_null($usersCheck) && is_null($pegawaiCheck)) {
                    $remaining = RateLimiter::remaining($key, $maxAttempt);
                    return response()->json(['status' => 'failed', 'message' => 'Nip Atau Password Salah, Sisa ' . $remaining . ' kali Percobaan'], 200);
                }
                if (is_null($pegawaiCheck)) {
                    if (Auth::attempt($credentials)) {
                        $payload = [
                            'sub' => 'User',
                            'surat_id' => ['id' => $usersCheck->id],
                            'iss' => 'E-surat RaudlLatul Jannah',
                            'exp' => time() + env('TIME_EXPIRATION'),
                        ];
                        try {
                            $jwt = $this->util->makeJWT($payload);
                            return response()->json(
                                [
                                    'status' => 'success',
                                    'data' => $jwt,
                                ],
                                200,
                            );
                        } catch (\Throwable $th) {
                            return response()->json(['status' => 'failed'], 400);
                        }
                    } else {
                        $remaining = RateLimiter::remaining($key, $maxAttempt);
                        return response()->json(['status' => 'failed', 'message' => 'Nip Atau Password Salah, Sisa ' . $remaining . ' kali Percobaan'], 200);
                    }
                } else {
                    $payload = [
                        'sub' => 'Pegawai',
                        'surat_id' => [
                            'id' => $pegawaiCheck->id,
                        ],
                        'iss' => 'E-surat RaudlLatul Jannah',
                        'exp' => time() + env('TIME_EXPIRATION'),
                    ];
                    try {
                        $jwt = $this->util->makeJWT($payload);
                        return response()->json(
                            [
                                'status' => 'success',
                                'data' => $jwt,
                            ],
                            200,
                        );
                    } catch (\Throwable $th) {
                        return response()->json(['status' => 'failed'], 400);
                    }
                }
            },
            300,
        );
        return $executed;
    }

    public function logout(Request $request)
    {
        Auth::logout();
        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
