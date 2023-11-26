<?php

namespace App\Controller;

use App\Client\ApiClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class AbstractApiController extends AbstractController
{
    public function __construct(
        protected ApiClient $client
    ){}

    protected function getClient(): ApiClient
    {
        return $this->client;
    }
}