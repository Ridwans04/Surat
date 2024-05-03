<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\master\master_pj;
use Illuminate\Http\Request;

class master_pjController extends Controller
{
    public function get_data_pj()
    {
        $data = master_pj::all();
        return response()->json([
            'data' => $data,
            'success' => true,
        ]);
    }
}
