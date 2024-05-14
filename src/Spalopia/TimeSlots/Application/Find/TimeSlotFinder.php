<?php

namespace Spalopia\TimeSlots\Application\Find;

use Spalopia\TimeSlots\Domain\TimeSlot;
use Spalopia\TimeSlots\Domain\TimeSlotId;
use Spalopia\TimeSlots\Domain\TimeSlotNotExist;
use Spalopia\TimeSlots\Domain\TimeSlotRepository;

final readonly class TimeSlotFinder
{
    public function __construct(private TimeSlotRepository $repository) {}

    public function __invoke(TimeSlotId $id): TimeSlot
    {
        $service = $this->repository->search($id);

        if (null === $service) {
            throw new TimeSlotNotExist(sprintf('The time slot <%s> does not exist', $id->value()));
        }

        return $service;
    }
}
