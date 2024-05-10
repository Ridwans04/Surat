<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class roleChecking
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $rl)
    {
        $role = explode(',', $rl);
        if(session('role') == env($role)){
            return $next($request);
        }
    }
}
