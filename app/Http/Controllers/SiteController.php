<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CoronaVirusService; 

class SiteController extends Controller
{
    public function Home()
    {
        $CoronaVirus = new CoronaVirusService();
        $TotalCases = $CoronaVirus->ByCountryTotalStatus('brazil');
        // dd($TotalCases);
        // dd($teste->AllCountries());
        // dd($teste->DayOne('brazil'));
        // dd($teste->ByCountryTotalStatus('brazil'));
        return view('site.home', compact('TotalCases'));
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
