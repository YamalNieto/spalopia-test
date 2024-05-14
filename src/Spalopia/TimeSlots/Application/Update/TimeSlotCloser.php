<?php

namespace Spalopia\TimeSlots\Application\Update;

use Spalopia\TimeSlots\Application\Find\TimeSlotFinder;
use Spalopia\TimeSlots\Domain\TimeSlotId;
use Spalopia\TimeSlots\Domain\TimeSlotRepository;

final readonly class TimeSlotCloser
{
    private TimeSlotFinder $finder;

    public function __construct(private TimeSlotRepository $repository)
    {
        $this->finder = new TimeSlotFinder($this->repository);
    }

    public function __invoke(TimeSlotId $id): void
    {
        $timeSlot = $this->finder->__invoke($id);

        $timeSlot->close();

        $this->repository->save($timeSlot);
    }
}
