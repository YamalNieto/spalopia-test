<?php

namespace Spalopia\Reservations\Application\Create;

use Spalopia\Reservations\Domain\ReservationCustomerEmail;
use Spalopia\Reservations\Domain\ReservationCustomerName;
use Spalopia\Reservations\Domain\ReservationId;
use Spalopia\Reservations\Domain\ReservationPrice;
use Spalopia\Reservations\Domain\ReservationSpaServiceId;
use Spalopia\Shared\Domain\Bus\Command\CommandHandler;
use Spalopia\TimeSlots\Domain\TimeSlotId;

final readonly class CreateReservationCommandHandler implements CommandHandler
{
    public function __construct(private ReservationCreator $creator) {}

    public function __invoke(CreateReservationCommand $command): void
    {
        $id = new ReservationId($command->id());
        $customerName = new ReservationCustomerName($command->customerName());
        $customerEmail = new ReservationCustomerEmail($command->customerEmail());
        $serviceId = new ReservationSpaServiceId($command->servideId());
        $price = new ReservationPrice($command->price());
        $timeSlotId = new TimeSlotId($command->timeSlotId());

        $this->creator->__invoke($id, $customerName, $customerEmail, $serviceId, $price, $timeSlotId);
    }
}
