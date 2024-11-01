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
use Illuminate\Support\Facades\Validator;

class auth_controller extends Controller
{
    protected $util;
    protected $pegawai;
    public function __construct()
    {
        $this->util = new Util();
    }

    public function send_otp(Request $request)
    {
        // Validasi input nomor telepon dari AJAX
        $validator = Validator::make($request->all(), [
            'mobile_number' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Nomor telepon tidak valid.'], 422);
        }

        // Generate OTP
        $otp = rand(100000, 999999);

        try {
            // Kirim OTP melalui Fonnte API
            $response = Http::withHeaders([
                'Authorization' => '7XkD@qKvbcoBFxkP8hpr',
            ])->post('https://api.fonnte.com/send', [
                'target' => $request->input('mobile_number'), // langsung ambil dari request
                'message' => 'Your OTP: ' . $otp,
            ]);

            // Cek apakah respons dari Fonnte berhasil
            if ($response->successful()) {
                // Simpan OTP ke dalam session (atau database jika diperlukan)
                session(['otp' => $otp]);

                return response()->json(['success' => true, 'message' => 'Kode OTP berhasil dikirim.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Gagal mengirim OTP. Silakan coba lagi.']);
            }
        } catch (\Exception $e) {
            // Penanganan error jika terjadi masalah koneksi atau server Fonnte
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat mengirim OTP: ' . $e->getMessage()]);
        }
    }

    public function registration(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'no_hp' => 'required|numeric',
        ]);

        $nip = $request->input('nip');
        $password = $request->input('password');
        $nomor = $request->input('no_hp');

        // Verifikasi NIP dan password
        $user = User::where('nip', $nip)->first();
            
        return response()->json(['success' => true, 'message' => 'OTP sent successfully.']);
           
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nip' => 'required',
            'password' => 'required',
        ]);

        // MENGAMBIL DATA USERS
        $usersCheck = User::all()
            ->where('nip', '=', $request->nip)
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
            function () use ($request, $credentials, $usersCheck, $key, $maxAttempt) {
                if (is_null($usersCheck)) {
                    $remaining = RateLimiter::remaining($key, $maxAttempt);
                    return response()->json(['status' => 'failed', 'message' => 'Nip Atau Password Salah, Sisa ' . $remaining . ' kali Percobaan'], 200);
                }
                if (Auth::attempt($credentials)) {
                    $payload = [
                        'sub' => $usersCheck->sub,
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
            },
            300,
        );
        return $executed;
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
