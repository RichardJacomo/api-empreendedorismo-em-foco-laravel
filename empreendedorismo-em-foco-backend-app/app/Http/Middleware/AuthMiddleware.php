<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Throwable;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthMiddleware 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{
            $user = JWTAuth::parseToken()->authenticate();
        }catch(\Exception $e){

            if ($e instanceof TokenExpiredException) {
                return response()->json(['error' => 'Token expirado'], 401);
            } else if ($e instanceof TokenInvalidException) {
                return response()->json(['error' => 'Token inválido'], 401);
            }else{
                return response()->json(['error' => 'Atuhorization Token not found'], 401);
            }
        }

        return $next($request);
    }
}
