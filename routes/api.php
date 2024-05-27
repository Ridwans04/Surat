<?php

use App\Http\Controllers\auth\auth_controller;
use App\Http\Controllers\data\permohonan_suratController;
use App\Http\Controllers\master\master_akunController;
use App\Http\Controllers\master\master_suratController;
use App\Http\Controllers\user\user_roleController;
use Illuminate\Http\Request;
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

// AUTH
Route::group(['prefix' => 'auth'], function () {
    Route::post('authenticate', [auth_controller::class, 'authenticate'])->name('authenticate');
});
// MASTER AKUN
Route::middleware('roleCheck:super_admin')->group(function () {
    Route::prefix('user')->group(function () {
        Route::apiResource("user_role", user_roleController::class);
        Route::post('add_akun', [master_akunController::class, 'add_akun'])->name('add_akun');
        Route::put('update_akun', [master_akunController::class, 'update_akun'])->name('update_akun');
        Route::delete('hapus_akun', [master_akunController::class, 'hapus_akun'])->name('hapus_akun');
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
