<?php

namespace Spalopia\TimeSlots\Domain;

use DateTimeImmutable;

final readonly class TimeSlotDay
{
    public function __construct(private DateTimeImmutable $value)
    {
        if (!$this->checkDate($value)) {
            throw new InvalidTimeSlotDayException('The day must be from today to the future.');
        }
    }

    public function value(): DateTimeImmutable
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value->format('Y-m-d');
    }

    private function checkDate(DateTimeImmutable $value): bool
    {
        return $value >= new DateTimeImmutable('now');
    }
}
