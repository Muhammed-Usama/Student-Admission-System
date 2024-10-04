<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    public function faculities()
    {
        return view('faculities');
    }
    public function contact()
    {
        return view('contact');
    }
}
