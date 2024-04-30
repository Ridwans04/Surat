<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class master_akunController extends Controller
{
    public function get_data_akun()
    {
        $data = User::all();

        return response([
            'data' => $data,
            'success' => true
        ]);
    }
}
