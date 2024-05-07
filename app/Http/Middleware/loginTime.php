<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class loginTime
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
        if (
            session('role') === env('admin') ||
            session('role') === env('super_admin')
        ) {
            return redirect()->to('/daftarLayanan');
        } elseif (
            session('role') == env('admin') ||
            session('role') == env('keuangan') ||
            session('role') == env('superadmin')
        ) {
            return redirect()->to('/dashboardAdmin');
        } elseif (
            session('role') == env('tenaga_ahli')
        ) {
            return redirect()->to('/kelolaPemesanan');
        }
        return $next($request);
    }
}
