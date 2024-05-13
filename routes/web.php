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
// Route::post('setSession', Util::class, 'setSession')->name('setSession');

// AUTH
// Route::middleware('loginTime:admin,guru')->group(function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::view('login_page', 'content/auth/login_page')->name('login');
        Route::post('authenticate', [auth_controller::class, 'authenticate'])->name('authenticate');
        Route::get('logout', [auth_controller::class, 'logout'])->name('logout');
        Route::get('regis_page', [auth_controller::class, 'regis'])->name('regis');
        Route::post('registrasi_store', [auth_controller::class, 'regis_store'])->name('regis_store');
    });
// });

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
Route::get('permohonan_surat', [permohonan_suratController::class, 'permohonan_surat'])->name('permohonan_surat');

/* Route Dashboards */
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('analytics', [DashboardController::class, 'dashboardAnalytics'])->name('dashboard-analytics');
    Route::get('ecommerce', [DashboardController::class, 'dashboardEcommerce'])->name('dashboard-ecommerce');
});
/* Route Dashboards */

/* Route Apps */
Route::group(['prefix' => 'app'], function () {
    Route::get('email', [AppsController::class, 'emailApp'])->name('app-email');
    Route::get('chat', [AppsController::class, 'chatApp'])->name('app-chat');
    Route::get('todo', [AppsController::class, 'todoApp'])->name('app-todo');
    Route::get('calendar', [AppsController::class, 'calendarApp'])->name('app-calendar');
    Route::get('kanban', [AppsController::class, 'kanbanApp'])->name('app-kanban');
    Route::get('invoice/list', [AppsController::class, 'invoice_list'])->name('app-invoice-list');
    Route::get('invoice/preview', [AppsController::class, 'invoice_preview'])->name('app-invoice-preview');
    Route::get('invoice/edit', [AppsController::class, 'invoice_edit'])->name('app-invoice-edit');
    Route::get('invoice/add', [AppsController::class, 'invoice_add'])->name('app-invoice-add');
    Route::get('invoice/print', [AppsController::class, 'invoice_print'])->name('app-invoice-print');
    Route::get('ecommerce/shop', [AppsController::class, 'ecommerce_shop'])->name('app-ecommerce-shop');
    Route::get('ecommerce/details', [AppsController::class, 'ecommerce_details'])->name('app-ecommerce-details');
    Route::get('ecommerce/wishlist', [AppsController::class, 'ecommerce_wishlist'])->name('app-ecommerce-wishlist');
    Route::get('ecommerce/checkout', [AppsController::class, 'ecommerce_checkout'])->name('app-ecommerce-checkout');
    Route::get('file-manager', [AppsController::class, 'file_manager'])->name('app-file-manager');
    Route::get('access-roles', [AppsController::class, 'access_roles'])->name('app-access-roles');
    Route::get('access-permission', [AppsController::class, 'access_permission'])->name('app-access-permission');
    Route::get('user/list', [AppsController::class, 'user_list'])->name('app-user-list');
    Route::get('user/view/account', [AppsController::class, 'user_view_account'])->name('app-user-view-account');
    Route::get('user/view/security', [AppsController::class, 'user_view_security'])->name('app-user-view-security');
    Route::get('user/view/billing', [AppsController::class, 'user_view_billing'])->name('app-user-view-billing');
    Route::get('user/view/notifications', [AppsController::class, 'user_view_notifications'])->name('app-user-view-notifications');
    Route::get('user/view/connections', [AppsController::class, 'user_view_connections'])->name('app-user-view-connections');
});
/* Route Apps */
