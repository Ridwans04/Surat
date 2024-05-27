<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\auth\auth_controller;
use App\Http\Controllers\auth\google_authController;
use App\Http\Controllers\data\permohonan_suratController;
use App\Http\Controllers\Util;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Main Page Route
Route::view('/', 'content/auth/login_page')->name('login');
Route::view('/privacy', 'content/privacy_policies/privacy');
Route::post('setSession', [Util::class, 'setSession'])->name('setSession');

Route::prefix('auth')->group(function () {
    Route::prefix('google')->group(function () {
        Route::get("redirect", [google_authController::class, "redirectGoogle"])->name('redirect.google');
        Route::get("callback", [google_authController::class, "callback"])->name("callback.google");
    });
});

// Route::get('/toggle-theme', [Util::class, 'toggleTheme'])->name('theme.toggle');

// AUTH
Route::group(['prefix' => 'auth'], function () {
    Route::view('login_page', 'content/auth/login_page')->name('login');
    Route::post('logout', [auth_controller::class, 'logout'])->name('logout');
    Route::get('regis_page', [auth_controller::class, 'regis'])->name('regis');
    Route::post('registrasi_store', [auth_controller::class, 'regis_store'])->name('regis_store');
});
Route::middleware('authenticatedWeb')->group(function () {
    // BERANDA
    Route::group(['prefix' => 'beranda'], function () {
        Route::view('admin', 'content.home.beranda_admin')->name('beranda.admin');
        Route::view('pj', 'content.home.beranda_pj')->name('beranda.pj');
        Route::view('staff_sdm', 'content.home.beranda_staff_sdm')->name('beranda.staff_sdm');
    });

    // MASTER AKUN
    Route::group(['prefix' => 'akun'], function () {
        Route::view('kelola_user', 'content/master/akun/user/index', [
            'breadcrumbs' => [
                ['link' => "javascript:void(0)", 'name' => "Kelola User"], ['link' => "javascript:void(0)", 'name' => "User Role & Institusi"]
            ],
        ])->name('kelola_user');
        Route::view('kelola_pegawai', 'content/master/akun/pegawai/index', [
            'breadcrumbs' => [
                ['link' => "javascript:void(0)", 'name' => "Kelola Pegawai"], ['link' => "javascript:void(0)", 'name' => "Klasifikasi & Institusi Pegawai"]
            ],
        ])->name('kelola_pegawai');
        
    });

    // PERMOHONAN SURAT
    Route::group(['prefix' => 'permohonan'], function () {
        Route::get('surat', [permohonan_suratController::class, 'permohonan_surat'])->name('permohonan_surat');
    });
});