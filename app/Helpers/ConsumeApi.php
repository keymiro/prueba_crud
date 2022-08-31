<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class ConsumeApi {

    private $method;
    private $url;
    private $params;


    public function __construct($method,$url,array $params)
    {
        $this->method = $method;
        $this->url = $url;
        $this->params = $params;
    }

    public function apiResource()
    {
        $client = new Client([
            'base_uri' =>  env('API_ENDPOINT')
            ]);

        if (!empty(is_array($this->params))) {

            $paramsApi = $this->params;

        }else{

            $paramsApi = NULL;
        }
           $response = $client->request( $this->method,$this->url,$paramsApi);

           $data = json_decode($response->getBody()->getContents());

           return $data;
    }
}
