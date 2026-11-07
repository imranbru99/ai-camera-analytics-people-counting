<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SafetyIncidentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has the necessary permissions
        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            return redirect('/login');
        }

        // Allow access to safety incident-related routes
        if ($request->is('admin/safety-incident*')) {
            return $next($request);
        }

        // Deny access to other routes
        return abort(403, 'Unauthorized');
    }
}
