<?php

namespace AccessTrade\Api;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;


class Api
{
    protected $accessToken;
    protected $api_base = 'https://api.accesstrade.vn/';
    protected $api_version = 'v1';

    public function __construct($accessToken = null)
    {
        $this->accessToken = $accessToken;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    private function request($method = 'GET', $path, $params = []){
        // New client
        $client = new Client();
        $api_url = $this->api_base.$this->api_version.$path.'?'.http_build_query($params);

        try {
            $request = $client->request($method, $api_url, [
                'headers' => [
                    'User-Agent'        => 'AccessTradeApi/1.0',
                    'Authorization'     => 'Token '.$this->accessToken,
                    'Content-Type'      => 'application/json'
                ]
            ]);
            return $request->getBody();
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
    }

    public function getCampaigns(){
        $params = [];
        $campaigns = $this->request('GET', '/campaigns', $params);

        return $campaigns;
    }

    public function getTransactions(){
        $params = [
            'since' => '',
            'until'    => ''
        ];
        $transactions = $this->request('GET', '/transactions', $params);
        // Return transactions
        return $transactions;
    }
}
