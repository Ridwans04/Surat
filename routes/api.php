<?php

use App\Http\Controllers\api\captcha_controller;
use App\Http\Controllers\auth\auth_controller;
use App\Http\Controllers\data\permohonan_suratController;
use App\Http\Controllers\master\master_institusiController;
use App\Http\Controllers\master\master_roleController;
use App\Http\Controllers\master\master_suratController;
use App\Http\Controllers\user\user_institusiController;
use App\Http\Controllers\user\user_roleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// AUTH API ROUTE
Route::group(['prefix' => 'auth'], function () {
    Route::post('registration', [auth_controller::class, 'registration'])->name('registration');
    Route::post('authenticate', [auth_controller::class, 'authenticate'])->name('authenticate');
    Route::post('logout', [auth_controller::class, 'logout'])->name('logout');   
    Route::post('/send_otp', [auth_controller::class, 'send_otp'])->name('send_otp');
    Route::post('/verify-otp', [auth_controller::class, 'verifyOtp'])->name('verify.otp');
});
// END AUTH ROUTE

// AUTH

// MASTER AKUN
Route::middleware('roleCheck:super_admin')->group(function () {
    Route::prefix('user')->group(function () {
        Route::apiResource('user_role', user_roleController::class);
        Route::apiResource('user_ins', user_institusiController::class);
    });
    Route::prefix('master')->group(function () {
        Route::apiResource('institusi', master_institusiController::class);
        Route::apiResource('role', master_roleController::class);
        Route::apiResource('surat', master_suratController::class);
    });
});

// MASTER SURAT
Route::get('get_data_surat', [master_suratController::class, 'get_data_surat'])->name('get_data_surat');
Route::post('add_surat', [master_suratController::class, 'add_surat'])->name('add_surat');
Route::put('update_surat', [master_suratController::class, 'update_surat'])->name('update_surat');
Route::delete('hapus_surat', [master_suratController::class, 'hapus_surat'])->name('hapus_surat');

// PERMOHONAN SURAT
Route::get('get_ins', [permohonan_suratController::class, 'get_ins'])->name('get_ins');
Route::get('get_list_pj', [permohonan_suratController::class, 'get_list_pj'])->name('get_list_pj');
Route::post('add_req_surat', [permohonan_suratController::class, 'add_req_surat'])->name('add_req_surat');
