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

// MAIN PAGE
Route::view('/', 'content/auth/login_page')->name('login');

// SESSION USER ROUTE
Route::post('setSession', [Util::class, 'setSession'])->name('setSession');
// END SESSION ROUTE

// GOOGLE SSO AUTH
Route::prefix('auth')->group(function () {
    Route::prefix('google')->group(function () {
        Route::get('redirect', [google_authController::class, 'redirectGoogle'])->name('redirect.google');
        Route::get('callback', [google_authController::class, 'callback'])->name('callback.google');
    });
});
Route::view('/privacy', 'content/privacy_policies/privacy');
// END SSO ROUTE

// AUTH
Route::group(['prefix' => 'auth'], function () {
    Route::view('login_page', 'content/auth/login/login_page')->name('login');
    Route::view('regis_page', 'content/auth/registrasi/regis_page')->name('regis');
});
// END AUTH ROUTE

// Route::middleware('authenticatedWeb')->group(function () {
    // BERANDA
    Route::group(['prefix' => 'beranda'], function () {
        Route::view('admin', 'content.home.beranda_admin')->name('beranda.admin');
        Route::view('pj', 'content.home.beranda_pj')->name('beranda.pj');
        Route::view('staff_sdm', 'content.home.beranda_staff_sdm')->name('beranda.staff_sdm');
    });

    // MASTER AKUN
    Route::group(['prefix' => 'akun'], function () {
        Route::view('kelola_user', 'content/master/akun/user/index', [
            'breadcrumbs' => [['link' => 'javascript:void(0)', 'name' => 'Kelola User'], ['link' => 'javascript:void(0)', 'name' => 'User Role & Institusi']],
        ])->name('kelola_user');
        Route::view('kelola_pegawai', 'content/master/akun/pegawai/index', [
            'breadcrumbs' => [['link' => 'javascript:void(0)', 'name' => 'Kelola Pegawai'], ['link' => 'javascript:void(0)', 'name' => 'Klasifikasi & Institusi Pegawai']],
        ])->name('kelola_pegawai');
    });

    // MASTER DATA
    Route::group(['prefix' => 'master'], function () {
        // MASTER INSTITUSI
        Route::view('institusi', 'content/master/institusi/index', [
            'breadcrumbs' => [['link' => 'javascript:void(0)', 'name' => 'Master Institusi'], ['link' => 'javascript:void(0)', 'name' => 'Tabel Institusi']],
        ])->name('master.institusi');

        // MASTER ROLE
        Route::view('role', 'content/master/role/index', [
            'breadcrumbs' => [['link' => 'javascript:void(0)', 'name' => 'Master Role'], ['link' => 'javascript:void(0)', 'name' => 'Data Role']],
        ])->name('master.role');

        // MASTER SURAT
        Route::view('surat', 'content/master/surat/index', [
            'breadcrumbs' => [['link' => 'javascript:void(0)', 'name' => 'Master Surat'], ['link' => 'javascript:void(0)', 'name' => 'List Surat RJ']],
        ])->name('master.surat');
    });

    // PERMOHONAN SURAT
    Route::group(['prefix' => 'permohonan'], function () {
        Route::get('surat', [permohonan_suratController::class, 'permohonan_surat'])->name('permohonan_surat');
    });
// });
