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
        // Check if the user is authenticated
        if (!Auth::check()) {
            // User is not authenticated, redirect to login
            return redirect()->route('login')->withErrors('You must log in to access this page.');
        }

        // Retrieve user role from the authenticated user
        $userRole = Auth::user()->role; // Assuming 'role' is a field in your User model

        // Check user role
        if ($userRole === 'admin') {
            return $next($request); // Allow admin to proceed to the requested route
        }

        // If the user is authenticated but not an admin, log them out and redirect to login
        Auth::logout();
        session()->flush();
        return redirect()->route('login')->withErrors('You are not authorized to access this page.');
    }
}
