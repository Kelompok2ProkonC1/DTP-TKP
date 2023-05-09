<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KaryawanMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && (auth()->user()->role_user === 'Karyawan' || auth()->user()->role_user === 'Super Admin')) {
            return $next($request);
        }
        return back();
    }
}
