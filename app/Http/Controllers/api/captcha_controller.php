<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class captcha_controller extends Controller
{
    public function validateCaptcha(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'captcha' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Kode CAPTCHA tidak valid'], 422);
        }

        return response()->json(['success' => true, 'message' => 'CAPTCHA benar']);
    }
}
