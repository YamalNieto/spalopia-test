<?php

namespace Spalopia\Reservations\Application\Create;

use Spalopia\Shared\Domain\Bus\Command\Command;

final readonly class CreateReservationCommand implements Command
{
    public function __construct(
        private string $id,
        private string $customerName,
        private string $customerEmail,
        private string $serviceId,
        private string $price,
        private string $timeSlotId,
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function customerName(): string
    {
        return $this->customerName;
    }

    public function customerEmail(): string
    {
        return $this->customerEmail;
    }

    public function servideId(): string
    {
        return $this->serviceId;
    }

    public function price(): string
    {
        return $this->price;
    }

    public function timeSlotId(): string
    {
        return $this->timeSlotId;
    }
}
