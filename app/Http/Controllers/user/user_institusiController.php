<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class user_institusiController extends Controller
{
    public function index()
    {
        $data = User::with(['has_many_userins.has_one_masterins'])->get();

        return response([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
