<?php

namespace Spalopia\Reservations\Domain;

use DateTimeImmutable;

final readonly class ReservationDay
{
    private string $value;

    public function __construct(private DateTimeImmutable $day)
    {
        if (!$this->checkDate($day)) {
            throw new InvalidReservationDayException('The day must be from today to the future.');
        }

        $this->value = $this->__toString();
    }

    public function value(): string
    {
        return $this->value;
    }

    public function day(): DateTimeImmutable
    {
        return $this->day;
    }

    public function __toString(): string
    {
        return $this->day->format('Y-m-d');
    }

    private function checkDate(DateTimeImmutable $day): bool
    {
        return $day->format('Y-m-d') >= (new DateTimeImmutable('now'))->format('Y-m-d');
    }
}