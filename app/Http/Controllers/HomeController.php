<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CoronaVirusService; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Index()
    {
        $CoronaVirus = new CoronaVirusService();
        $Countries = $CoronaVirus->AllCountries();

        return view('home', compact('Countries'));
    }

    public function ShowDetailsCountrie($Country,$Days = null)
    {
        
        $CoronaVirus = new CoronaVirusService();
        $Details = $CoronaVirus->TotalLastDays($Country, ($Days) ? $Days : null);

        return response()->json($Details,200);
    }
}
