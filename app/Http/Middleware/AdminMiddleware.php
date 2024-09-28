<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve user role and registration status from the session
        $userRole = session('role');
        $alreadyRegistered = session('already_registered');

        // Check user role
        if ($userRole === 'admin') {
            return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
        } elseif ($userRole === 'user') {
            if ($alreadyRegistered === 'yes') {
                return redirect()->route('profile'); // Redirect to profile if already registered
            }
            return $next($request); // Allow the request to proceed for regular users
        }

        // If the user is not authenticated or has an unrecognized role, redirect to login
        return redirect()->route('login');
    }
}
