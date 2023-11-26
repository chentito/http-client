<?php

namespace App\Client\Factory;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class ClientFactory
{
      public function __invoke(string $api_host): ClientInterface
    {
        return new Client([
            'base_uri' => $api_host,
        ]);
    }
}
