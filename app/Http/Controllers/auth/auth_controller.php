<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;

class auth_controller extends Controller
{
    protected $util;
    protected $pegawai;
    public function __construct()
    {
        $this->util = new Util();
    }

    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'nip' => 'required',
    //         'password' => 'required',
    //     ]);

    //     // MENGAMBIL DATA USERS
    //     $usersCheck = User::all()
    //         ->where('nip', '=', $request->nip)
    //         ->first();

    //     $key = 'verify:' . $request->ip();

    //     $maxAttempt = 5;
    //     if (RateLimiter::tooManyAttempts($key, $maxAttempt)) {
    //         $seconds = RateLimiter::availableIn($key);
    //         return response()->json(['status' => 'failed', 'message' => 'Sudah Mencoba Terlalu Banyak, Bisa Mencoba Lagi Dalam ' . floor($seconds / 60) . ' Menit ' . $seconds % 60 . ' Detik'], 200);
    //     }
    //     $executed = RateLimiter::attempt(
    //         $key,
    //         $maxAttempt,
    //         function () use ($request, $credentials, $usersCheck, $key, $maxAttempt) {
    //             if (is_null($usersCheck)) {
    //                 $remaining = RateLimiter::remaining($key, $maxAttempt);
    //                 return response()->json(['status' => 'failed', 'message' => 'Nip Atau Password Salah, Sisa ' . $remaining . ' kali Percobaan'], 200);
    //             }
    //             if (Auth::attempt($credentials)) {
    //                 $payload = [
    //                     'sub' => $usersCheck->sub,
    //                     'surat_id' => ['id' => $usersCheck->id],
    //                     'iss' => 'E-surat RaudlLatul Jannah',
    //                     'exp' => time() + env('TIME_EXPIRATION'),
    //                 ];
    //                 try {
    //                     $jwt = $this->util->makeJWT($payload);
    //                     return response()->json(
    //                         [
    //                             'status' => 'success',
    //                             'data' => $jwt,
    //                         ],
    //                         200,
    //                     );
    //                 } catch (\Throwable $th) {
    //                     return response()->json(['status' => 'failed'], 400);
    //                 }
    //             } else {
    //                 $remaining = RateLimiter::remaining($key, $maxAttempt);
    //                 return response()->json(['status' => 'failed', 'message' => 'Nip Atau Password Salah, Sisa ' . $remaining . ' kali Percobaan'], 200);
    //             }
    //         },
    //         300,
    //     );
    //     return $executed;
    // }

    public function authenticate(Request $request)
    {
        $request->validate([
            'nip' => 'required|string',
            'password' => 'required|string',
            'no_hp' => 'required|numeric',
        ]);

        $nip = $request->input('nip');
        $password = $request->input('password');
        $nomor = $request->input('no_hp');

        // Verifikasi NIP dan password
        $user = User::where('nip', $nip)->first();

        if ($user && Hash::check($password, $user->password)) {
            // Hapus OTP lama jika ada
            $user->otp = null;
            $user->otp_time = null;
            $user->save();

            // Generate OTP
            $otp = rand(100000, 999999);
            $user->otp = $otp;
            $user->otp_time = now();
            $user->save();

            // Kirim OTP melalui Fonnte API
            $response = Http::withHeaders([
                'Authorization' => '7XkD@qKvbcoBFxkP8hpr',
            ])->post('https://api.fonnte.com/send', [
                'target' => $nomor,
                'message' => 'Your OTP : ' . $otp,
            ]);

            if ($response->successful()) {
                // Kirim respon JSON agar AJAX bisa menangani
                return response()->json(['success' => true, 'message' => 'OTP sent successfully.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to send OTP.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid NIP or password.']);
        }
    }

    // Method untuk memverifikasi OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'no_hp' => 'required|numeric',
            'otp' => 'required|numeric',
        ]);

        $nomor = $request->input('no_hp');
        $otp = $request->input('otp');

        // Cari pengguna dengan OTP yang sama dan nomor yang sama
        $user = User::where('otp', $otp)->where('otp_time', '>=', now()->subMinutes(5))->first();

        if ($user) {
            // OTP valid dan belum expired
            return response()->json(['message' => 'OTP verified successfully.']);
        } else {
            return response()->json(['message' => 'Invalid or expired OTP.'], 400);
        }
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
