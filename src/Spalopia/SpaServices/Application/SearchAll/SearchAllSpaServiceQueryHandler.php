<?php

namespace Spalopia\SpaServices\Application\SearchAll;

use Spalopia\SpaServices\Application\SearchAll\AllSpaServicesSearcher;
use Spalopia\SpaServices\Application\SpaServicesResponse;
use Spalopia\Shared\Domain\Bus\Query\QueryHandler;

final readonly class SearchAllSpaServiceQueryHandler implements QueryHandler
{
    public function __construct(private AllSpaServicesSearcher $searcher) {}

    public function __invoke(SearchAllSpaServiceQuery $query): SpaServicesResponse
    {
        return $this->searcher->searchAll();
    }
}
