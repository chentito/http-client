<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExampleTest extends WebTestCase
{
    /**
     * @test
     */
    public function getList(): void
    {
        $client = static::createClient();
        $client->request(
            Request::METHOD_GET,
            '/list'
        );

        self::assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
}
