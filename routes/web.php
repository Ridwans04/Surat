<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\auth\auth_controller;
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
Route::view('home', 'content/home/home')->name('home');
Route::post('setSession', [Util::class, 'setSession'])->name('setSession');

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
        Route::view('beranda_admin', 'content.home.beranda_admin');
    });

    // MASTER
    Route::group(['prefix' => 'master'], function () {
        Route::view('master_akun', 'content/master/master_akun/data')->name('master_akun');
        Route::view('master_pj', 'content/master/master_pj/data')->name('master_pj');
        Route::view('master_surat', 'content/master/master_surat/data')->name('master_surat');
    });

    // PERMOHONAN SURAT
    Route::group(['prefix' => 'permohonan'], function () {
        Route::get('surat', [permohonan_suratController::class, 'permohonan_surat'])->name('permohonan_surat');
    });
});