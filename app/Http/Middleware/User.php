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

        if( Auth::user()->role != "admin"){
            return redirect('/');
        }

        $user = Auth::user();
        if (
            str_contains($user, Auth::user()->role) 
        ) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
