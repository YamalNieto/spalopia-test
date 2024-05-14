<?php

namespace Spalopia\TimeSlots\Application\Find;

use Spalopia\Shared\Domain\Bus\Query\QueryHandler;
use Spalopia\TimeSlots\Application\TimeSlotResponse;
use Spalopia\TimeSlots\Domain\TimeSlotId;

final readonly class FindTimeSlotQueryHandler implements QueryHandler
{
    public function __construct(private TimeSlotFinder $finder)
    {
    }

    public function __invoke(FindTimeSlotQuery $query): TimeSlotResponse
    {
        $id = new TimeSlotId($query->id());

        $service = $this->finder->__invoke($id);

        return new TimeSlotResponse(
            $service->id()->value(),
            $service->serviceId()->value(),
            $service->day()->value(),
            $service->start()->value(),
            $service->end()->value(),
            $service->isAvailable()->value(),
        );
    }
}
