<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Util;
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
    protected $util;
    public function __construct()
    {
        $this->util = new Util;
    }
    
    public function handle(Request $request, Closure $next, $rl)
    {
        $role_middleware = explode('||', $rl);
        $token = $request->header('Authorization');
        $token = str_replace('Bearer ', '', $token);
        $id = $this->util->getIDFromToken($token);
        $role = $this->util->getRoleFromID($id);
        if(array_intersect($role, $role_middleware) !== []){
            return $next($request);
        }
        return response()->json([
            'status' => "failed",
            'message' => "Not Authorized",
        ]);
    }
}
