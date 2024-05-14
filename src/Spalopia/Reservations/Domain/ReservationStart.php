<?php

namespace Spalopia\Reservations\Domain;

final readonly class ReservationStart
{
    public function __construct(private string $value)
    {
        if (1 !== preg_match('/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $this->value)) {
            throw new InvalidReservationStartException('The time slot format must respect the HH:MM pattern.');
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
