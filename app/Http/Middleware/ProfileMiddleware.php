<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Check if the user is not registered
        if (!$user || $user->already_registered !== 'yes') {
            // Redirect to the 'student' route if not registered
            return redirect()->route('student');
        }

        // Continue to the next middleware or request handler
        return $next($request);
    }
}
