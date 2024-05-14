<?php

namespace Spalopia\SpaServices\Application\SearchTimeSlots;

use Spalopia\Shared\Domain\Bus\Query\QueryHandler;
use Spalopia\SpaServices\Application\SpaServiceResponse;
use Spalopia\SpaServices\Domain\SpaServiceId;
use Spalopia\TimeSlots\Domain\TimeSlotDay;

final readonly class SearchSpaServiceTimeSlotsQueryHandler implements QueryHandler
{
    public function __construct(private SpaServiceTimeSlotsSearcher $searcher)
    {
    }

    public function __invoke(SearchSpaServiceTimeSlotsQuery $query): SpaServiceResponse
    {
        $id = new SpaServiceId($query->id());

        $date = TimeSlotDay::fromString($query->day());

        return $this->searcher->__invoke($id, $date);
    }
}
