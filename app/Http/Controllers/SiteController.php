<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CoronaVirusService; 

class SiteController extends Controller
{
    public function Home()
    {
        $teste = new CoronaVirusService();
        // dd($teste->AllCountries());
        dd($teste->DayOne('brazil'));
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
