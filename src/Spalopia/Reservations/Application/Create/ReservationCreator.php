<?php

namespace Spalopia\Reservations\Application\Create;

use Spalopia\Reservations\Domain\TimeSlotNotAvailableException;
use Spalopia\Reservations\Domain\TimeSlotNotValidSpaServiceAssociated;
use Spalopia\TimeSlots\Application\Update\TimeSlotCloser;
use Spalopia\Reservations\Domain\Reservation;
use Spalopia\Reservations\Domain\ReservationCustomerEmail;
use Spalopia\Reservations\Domain\ReservationCustomerName;
use Spalopia\Reservations\Domain\ReservationDay;
use Spalopia\Reservations\Domain\ReservationId;
use Spalopia\Reservations\Domain\ReservationPrice;
use Spalopia\Reservations\Domain\ReservationRepository;
use Spalopia\Reservations\Domain\ReservationSpaServiceId;
use Spalopia\Reservations\Domain\ReservationStart;
use Spalopia\Shared\Domain\Bus\Query\QueryBus;
use Spalopia\TimeSlots\Application\Find\FindTimeSlotQuery;
use Spalopia\TimeSlots\Application\TimeSlotResponse;
use Spalopia\TimeSlots\Domain\TimeSlotId;

final readonly class ReservationCreator
{
    public function __construct(private ReservationRepository $repository, private QueryBus $queryBus, private TimeSlotCloser $timeSlotCloser) {}

    public function __invoke(
        ReservationId $id,
        ReservationCustomerName $customerName,
        ReservationCustomerEmail $customerEmail,
//        ReservationDay $day,
//        ReservationStart $start,
        ReservationSpaServiceId $serviceId,
        ReservationPrice $price,
        TimeSlotId $timeSlotId,
    ): void
    {
        /** @var TimeSlotResponse $timeSlot */
        $timeSlot = $this->queryBus->ask(new FindTimeSlotQuery($timeSlotId));

        if ($timeSlot->serviceId() !== $serviceId->value()) {
            throw new TimeSlotNotValidSpaServiceAssociated(
                sprintf('The time slot %s is not valid for the spa service %s',
                    $timeSlotId->value(),
                    $serviceId->value())
            );
        }

        if (!$timeSlot->available()) {
            throw new TimeSlotNotAvailableException(sprintf('The time slot %s is not available.', $timeSlotId->value()));
        }

        $this->repository->save(
            Reservation::create(
                $id,
                $customerName,
                $customerEmail,
                ReservationDay::fromString($timeSlot->day()),
                new ReservationStart($timeSlot->startTime()),
                $serviceId,
                $price),
        );

        $this->timeSlotCloser->__invoke($timeSlotId);
    }
}
