<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken
{

    protected $except = [
        'api/*', 
    ];

    public function handle(Request $request, Closure $next)
    {
        if ($this->isReading($request) || $this->runningUnitTests() || $this->inExceptArray($request)) {
            return $next($request);
        }

        if ($this->tokensMatch($request)) {
            return $next($request);
        }

        throw new TokenMismatchException;
    }
}
