<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\WhiteList; // Ensure to include your WhiteList model
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user's IP is in the whitelist
        $clientIp = $request->ip();
        if (!WhiteList::where('ip', $clientIp)->exists()) {
            Auth::guard('admin')->logout();
            abort(403);
        }
        return $next($request);
    }
}
