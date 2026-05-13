<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has admin privileges
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        // Block unauthorized access
        abort(403, 'Access Denied: This section of the archives is restricted to Administrators.');
    }
}