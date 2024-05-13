<?php

namespace Spalopia\SpaServices\Application\SearchAll;

use Spalopia\Shared\Domain\Bus\Query\QueryHandler;
use Spalopia\SpaServices\Application\SpaServicesResponse;

final readonly class SearchAllSpaServiceQueryHandler implements QueryHandler
{
    public function __construct(private AllSpaServicesSearcher $searcher) {}

    public function __invoke(SearchAllSpaServiceQuery $query): SpaServicesResponse
    {
        return $this->searcher->__invoke();
    }
}
