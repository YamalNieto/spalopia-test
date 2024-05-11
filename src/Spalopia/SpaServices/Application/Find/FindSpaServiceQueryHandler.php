<?php

namespace Spalopia\SpaServices\Application\Find;

use Spalopia\Shared\Domain\Bus\Query\QueryHandler;
use Spalopia\SpaServices\Domain\SpaServiceId;

final class FindSpaServiceQueryHandler implements QueryHandler
{
    public function __construct(private SpaServiceFinder $finder)
    {
    }

    public function __invoke(FindSpaServiceQuery $query): SpaServiceResponse
    {
        $id = new SpaServiceId($query->id());

        $service = $this->finder->__invoke($id);

        return new SpaServiceResponse($service->id()->value(), $service->name()->value(), $service->price()->value());
    }
}
