<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Show the admin login form
    public function login()
    {
        return view('admin.login'); // create a login view in resources/views/admin/login.blade.php
    }

    // Handle the admin login request
    public function connect(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the admin in
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            // Redirect to intended page after successful login
            return redirect()->route('admin.dashboard'); // change this to your intended redirect
        }

        // Redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle the admin logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        // Redirect to the login page after logout
        return redirect()->route('home'); // change this to your login route
    }
}
