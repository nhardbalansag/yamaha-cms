<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $user)
    {
        if(Auth::user()->role !== 'admin' && $user !== 'admin'){
            return $next($request);
        }
        if(Auth::user()->role !== 'customer' && $user !== 'customer'){
            return $next($request);
        }
        
        abort(403, 'Unauthorized');

    }
}
