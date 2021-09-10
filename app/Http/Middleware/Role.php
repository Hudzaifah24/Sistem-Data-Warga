<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'SUPERADMIN'){
            return $next($request);
        }
        // return $next($request);
        return redirect()->route('dashboard')->with('error', 'Anda Tidak Bisa Mengakses Page Ini');
    }
}
