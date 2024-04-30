<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class auth_controller extends Controller
{
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential = ['username' => $request->username, 'password' => $request->password];

        $routeMapping = [
            'Admin' => 'dashboard-ecommerce',
            'Staff' => 'beranda',
            'Policy Maker' => 'beranda_pm',
            'Super Admin' => 'home',
        ];
        
        if (Auth::attempt($credential)) {
            $userLevel = Auth::user()->level ?? 'default';
            $route = $routeMapping[$userLevel] ?? 'dashboard-ecommerce'; 
        
            return redirect()->route($route);
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('auth/login_page');
    }
}
