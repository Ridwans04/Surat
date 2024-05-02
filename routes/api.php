<?php

use App\Http\Controllers\master\master_akunController;
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

// MASTER AKUN
Route::get('get_data_akun', [master_akunController::class, 'get_data_akun'])->name('get_data_akun');
Route::post('add_akun', [master_akunController::class, 'add_akun'])->name('add_akun');
Route::put('update_akun', [master_akunController::class, 'update_akun'])->name('update_akun');
