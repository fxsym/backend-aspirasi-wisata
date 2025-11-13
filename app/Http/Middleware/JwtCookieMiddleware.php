<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Illuminate\Support\Facades\Log;

class JwtCookieMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('access_token');
        Log::info('Cookie access_token: ' . $token); // debug
        Log::info('Authorization header: ' . $request->header('Authorization'));

        try {
            if ($token) {
                $request->headers->set('Authorization', 'Bearer ' . $token);
            }

            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            Log::error('JWT Exception: ' . $e->getMessage());
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
