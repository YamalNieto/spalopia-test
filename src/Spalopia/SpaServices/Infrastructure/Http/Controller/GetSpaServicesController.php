<?php

namespace Spalopia\SpaServices\Infrastructure\Http\Controller;

use Spalopia\Shared\Domain\Bus\Query\QueryBus;
use Spalopia\SpaServices\Application\SearchAll\SearchAllSpaServiceQuery;
use Spalopia\SpaServices\Application\SpaServicesResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetSpaServicesController extends AbstractController
{
    public function __construct(private readonly QueryBus $queryBus)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        /** @var SpaServicesResponse $response */
        $response = $this->queryBus->ask(
            new SearchAllSpaServiceQuery(),
        );

        return new JsonResponse(array_map(static function ($service) {
            return [
                'id' => $service->id(),
                'name' => $service->name(),
                'price' => $service->price(),
            ];
        }, $response->services()),
        200,
        );
    }
}
