<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function Home()
    {
        return view('site.home');
    }

    public function Register()
    {
        return view('site.register');
    }

    public function Login()
    {
        return view('site.login');
    }
}
