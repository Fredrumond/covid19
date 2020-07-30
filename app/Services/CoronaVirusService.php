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
        $request = $this->HttpRequest->get(self::URL . $EndPoint);
        $response = json_decode($request->getBody()->getContents(), true);

        return $response;
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

}