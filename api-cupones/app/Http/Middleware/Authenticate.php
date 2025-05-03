<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class Authenticate
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            return response()->json(['error' => 'No autenticado'], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
