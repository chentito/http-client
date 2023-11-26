<?php

namespace App\Controller;

use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractApiController
{
    /**
     * @throws GuzzleException
     */
    #[Route('/list', name: 'list_all', methods: ['GET'])]
    public function getList(): Response
    {
        $results = $this->getClient()->get('/posts', []);

        return new JsonResponse($results);
    }

    /**
     * @throws GuzzleException
     */
    #[Route('/create', name: 'list_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $create = $this->getClient()->post('/posts', $request->request->all());

        return new JsonResponse($create);
    }

    /**
     * @throws GuzzleException
     */
    #[Route('/update-title/{postId}', name: 'list_update', methods: ['PATCH'])]
    public function update(int $postId, Request $request): Response
    {
        $update = $this->getClient()->patch(sprintf('/posts/%s', $postId), $request->request->all());

        return new JsonResponse($update);
    }

    /**
     * @throws GuzzleException
     */
    #[Route('/delete/{postId}', name: 'list_delete', methods: ['DELETE'])]
    public function delete(int $postId): Response
    {
        $delete = $this->getClient()->delete(sprintf('/posts/%s', $postId));

        return new JsonResponse($delete);
    }
}