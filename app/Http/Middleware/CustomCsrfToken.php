<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomCsrfToken
{
    public function handle($request, Closure $next)
    {
        if ($request->is('api/*')) {
            return $next($request);
        }

        // Handle CSRF token verification for non-API routes
        return $next($request);
    }
}
