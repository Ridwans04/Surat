<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\akun\user_role;
use App\Models\master\master_role;
use App\Models\User;
use Illuminate\Http\Request;

class user_roleController extends Controller
{
    public function index()
    {
        $data = User::with(['has_many_userrole.has_one_masterrole'])->get();
        return response([
            'data' => $data,
            'status' => 'success',
        ]);
    }

    public function show($user_id)
    { 
        $id = $user_id;
        $user = User::with(['has_many_userrole.has_one_masterrole'])
            ->where('id', $id)
            ->first();

        // Check if the user exists
        if ($user) {
            return response([
                'data' => [
                    'user_role' => $user,
                    'role' => master_role::all()->toArray(),
                ],
                'status' => 'success',
            ]);
        } else {
            return response(
                [
                    'message' => 'User not found',
                    'status' => 'error',
                ],
                404,
            );
        }
    }

    public function update($user_id, Request $request)
    {
        $id = $user_id;
        user_role::where('user_id', $id)->delete();
        if ($request->has('role')) {
            $roles = $request->role;
            foreach ($roles as $key => $value) {
                user_role::create([
                    'user_id' => $id,
                    'role_id' => $value
                ]);
            }
        }
        return response()->json(['status' => 'success'], 200);
    }
}
