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
    Route::get('logout', [auth_controller::class, 'logout'])->name('logout');
    Route::get('regis_page', [auth_controller::class, 'regis'])->name('regis');
    Route::post('registrasi_store', [auth_controller::class, 'regis_store'])->name('regis_store');
});
Route::middleware('authenticatedWeb')->group(function () {
    // BERANDA
    Route::group(['prefix' => 'beranda'], function () {
        Route::view('home', 'content/home/home')->name('home');
        Route::view('beranda_admin', 'content.home.beranda_admin');
    });

    // MASTER AKUN
    Route::group(['prefix' => 'master_akun'], function () {
        Route::view('kelola_user', 'content/master/master_akun/user/data')->name('kelola_user');
        
    });

    Route::group(['prefix' => 'master_surat'], function () {
        Route::view('klasifikasi_surat', 'content/master/master_pj/data')->name('klasifikasi_surat');
    });

    Route::group(['prefix' => 'master'], function () {
        Route::view('master_surat', 'content/master/master_surat/data')->name('master_surat');
    });

    // PERMOHONAN SURAT
    Route::group(['prefix' => 'permohonan'], function () {
        Route::get('surat', [permohonan_suratController::class, 'permohonan_surat'])->name('permohonan_surat');
    });
});