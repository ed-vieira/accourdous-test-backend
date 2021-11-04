<?php

namespace App\Services\Http;
use GuzzleHttp\Client;

class HttpService {

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function get(string $url, $params = []) {
        $response = $this->client->get($url, $params)->getBody()->getContents();
        return json_decode($response);
    }



}
