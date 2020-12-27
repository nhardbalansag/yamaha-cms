<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class API_authentication
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
        $secret = "capstoneProject2020-2021";
        $key = '$2y$10$Claj2RctAH3V4HRtSx17b.Q0WTh2STQyusvNZeCNo3UfSRakzStlC';

        $token = $request->bearerToken();
        $apikey = $request->header('KEY');

        $validateAPIKEY = Hash::check( $secret, $apikey);
        $validateTOKEN = Hash::check( $secret, $token);

        if(!$validateAPIKEY){
            return response()->json("Unauthorized", 401, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
        return $next($request);
    }
}
