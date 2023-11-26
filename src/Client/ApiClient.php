<?php

namespace App\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface as ApiResponse;
use Symfony\Component\HttpFoundation\Request;

class ApiClient
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws GuzzleException
     */
    public function get(string $url, array $parameters = []): array
    {
        $response = $this->client->request(
            Request::METHOD_GET,
            $url,
            [
                RequestOptions::QUERY => $parameters,
            ]
        );

        return self::response($response);
    }

    /**
     * @throws GuzzleException
     */
    public function post(string $url, array $parameters = []): array
    {
        $response = $this->client->request(
            Request::METHOD_POST,
            $url,
            [
                RequestOptions::FORM_PARAMS => $parameters,
            ]
        );

        return self::response($response);
    }

    /**
     * @throws GuzzleException
     */
    public function patch(string $url, array $parameters = []): array
    {
        $response = $this->client->request(
            Request::METHOD_PATCH,
            $url,
            [
                RequestOptions::FORM_PARAMS => $parameters
            ]
        );

        return self::response($response);
    }

    /**
     * @throws GuzzleException
     */
    public function delete(string $url): array
    {
        $response = $this->client->request(
            Request::METHOD_DELETE,
            $url
        );

        return self::response($response);
    }

    public static function response(ApiResponse $response): array
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}