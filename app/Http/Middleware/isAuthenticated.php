<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Util;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class isAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = session('token');
        if (!$token) {
            $token = $request->header('Authorization');
        }
        if (!$token) {
            return redirect()->route('login');
        }
        $token = str_replace('Bearer ', '', $token);
        try {
            $decode = JWT::decode($token, new Key(env('JWT_SECRET'), env('JWT_ALGO')));
        } catch (\Throwable $th) {
            return redirect()->route('login');
        }
        (new Util)->setSession2($token);
        return $next($request);
    }
}
