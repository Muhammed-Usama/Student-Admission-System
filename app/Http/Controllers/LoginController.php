<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function signup(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required',
        ]);

        // Create and save the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in after registration
        Auth::login($user);

        // Redirect to a secure page
        return redirect()->intended('/student');
    }
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Attempt to log in with the custom 'user' guard
        if (Auth::guard('user')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            // Optionally set user info in session after successful login
            $user = Auth::guard('user')->user();
            session(['user' => $user->email]); // or store any relevant user info
            if ($user->role === 'admin') {
                return response()->view('admin.dashboard'); // Redirect to admin dashboard
            } elseif ($user->role === 'user') {
                if ($user->already_registered === 'yes') {
                    return redirect()->route('profile'); // Redirect to profile
                }
                // Proceed for unregistered users
            }

            // Redirect to intended location or default route
            return redirect()->intended('/student');
        }

        // If login fails, redirect back with an error message
        return redirect()->route('login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        session()->flush();
        return redirect('/');
    }

}
