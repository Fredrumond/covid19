<?php

namespace App\Services;

use GuzzleHttp\Client;


class CoronaVirusService
{
    const URL = 'https://api.covid19api.com/';

    private $HttpRequest;

    public function __construct() 
	{
		$this->HttpRequest = new Client;	
    }
    
    private function MakeRequest($EndPoint)
    {
        $Request = $this->HttpRequest->get(self::URL . $EndPoint);
        $Response = json_decode($Request->getBody()->getContents(), true);

        return $Response;
    }

	public function AllCountries()
	{
        $EndPoint = 'countries';
        return self::MakeRequest($EndPoint);
    }
    
    public function DayOne($Country)
    {
        $EndPoint = 'country/' . $Country . '/status/confirmed';
        return self::MakeRequest($EndPoint);
    }
    
    public function TotalLastDays($Country, $Days)
    {
        
        $EndPoint = 'total/dayone/country/' . $Country;
        $Response = self::MakeRequest($EndPoint);

        if($Days)
        {
            $LastRegister = $Response[count($Response) - 1];
            
            $LastDate = date('Y-m-d', strtotime($LastRegister['Date'] . ' -' . $Days . 'day')) . 'T00:00:00Z';
            
            $Registers = [];

            foreach($Response as $Res)
            {
                if($Res['Date'] >= $LastDate)
                {
                    array_push($Registers, $Res);
                }
            }
            
            return $Registers;
        }

        return $Response;
    }
    
    public function ByCountryTotalStatus($Country)
    {
        $DateNow = date("Y/m/d");
        $LastDate = date('Y-m-d', strtotime($DateNow . ' -1 day'));
        $LastDateCases = date('Y-m-d', strtotime($DateNow . ' -2 day'));
        $Date = $LastDate . 'T00:00:00Z';
        $DateLastCases = $LastDateCases . 'T00:00:00Z';
        
        $EndPoint = 'country/' . $Country;

        $Response = self::MakeRequest($EndPoint);
        
        $AllStatus = new \StdClass();
        $AllStatusLast = new \StdClass();
        $AllStatusToday = new \StdClass();

        foreach($Response as $Res)
        {
            if($Res['Date'] == $Date)
            {
                $AllStatus->Confirmed = $Res['Confirmed'];
                $AllStatus->Deaths = $Res['Deaths'];
                $AllStatus->Recovered = $Res['Recovered'];
                $AllStatus->Active = $Res['Active'];
                $AllStatus->Date = $Res['Date'];
            }

            if($Res['Date'] == $DateLastCases)
            {
                $AllStatusLast->Confirmed = $Res['Confirmed'];
                $AllStatusLast->Deaths = $Res['Deaths'];
                $AllStatusLast->Recovered = $Res['Recovered'];
                $AllStatusLast->Active = $Res['Active'];
                $AllStatusLast->Date = $Res['Date'];
            }
        }
       
        $AllStatusToday->Confirmed = number_format($AllStatus->Confirmed,0,".",".");
        $AllStatusToday->Deaths = number_format($AllStatus->Deaths,0,".",".");
        $AllStatusToday->Recovered = number_format($AllStatus->Recovered,0,".",".");
        $AllStatusToday->Active = number_format($AllStatus->Active,0,".",".");
        $AllStatusToday->LastConfirmed = number_format($AllStatus->Confirmed - $AllStatusLast->Confirmed,0,".",".");
        $AllStatusToday->LastDeaths = number_format($AllStatus->Deaths - $AllStatusLast->Deaths,0,".",".");
        $AllStatusToday->LastRecovered = number_format($AllStatus->Recovered - $AllStatusLast->Recovered,0,".",".");
        $AllStatusToday->LastActive = number_format($AllStatus->Active - $AllStatusLast->Active,0,".",".");
        $AllStatusToday->Date = date("d/m/Y", strtotime($AllStatus->Date));

        return $AllStatusToday;
    }

}