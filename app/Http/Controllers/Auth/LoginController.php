<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Ensure you're using this import

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request // Ensure this is the correct type
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user) // Correctly type-hinted Request
    {
        // Check user role and redirect accordingly
        session(['user' => $user->email]);


    }
}
