<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiMiddleware
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
        $validApiToken = config("app.apiToken");
        $bearerToken = $request->bearerToken();
        if($bearerToken != $validApiToken) {
            return response()->json("You can not access this resource");
        }
        return $next($request);
    }
}
