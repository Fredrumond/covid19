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

	public function AllCountries()
	{
		$request = $this->HttpRequest->get(self::URL . 'countries');        

        $response = json_decode($request->getBody()->getContents(), true);

        return $response;
        
	}

}