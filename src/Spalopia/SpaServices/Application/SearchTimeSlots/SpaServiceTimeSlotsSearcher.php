<?php

namespace Spalopia\SpaServices\Application\SearchTimeSlots;

use Spalopia\SpaServices\Application\SpaServiceResponse;
use Spalopia\SpaServices\Domain\SpaServiceId;
use Spalopia\SpaServices\Domain\SpaServiceNotExist;
use Spalopia\SpaServices\Domain\SpaServiceRepository;
use Spalopia\TimeSlots\Domain\TimeSlotDay;

final readonly class SpaServiceTimeSlotsSearcher
{
    public function __construct(private SpaServiceRepository $repository) {}

    public function __invoke(SpaServiceId $id, TimeSlotDay $day): SpaServiceResponse
    {
        $service = $this->repository->search($id);

        if (null === $service) {
            throw new SpaServiceNotExist(sprintf('The spa service <%s> does not exist', $id->value()));
        }

        $timeSlots = $this->repository->searchTimeSlots($id, $day);

        return new SpaServiceResponse(
            $service->id()->value(),
            $service->name()->value(),
            $service->price()->value(),
            $timeSlots,
        );
    }
}
