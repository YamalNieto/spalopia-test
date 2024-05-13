<?php

namespace Spalopia\TimeSlots\Domain;

final readonly class TimeSlotEnd
{
    public function __construct(private string $value)
    {
        if (1 !== preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $this->value)) {
            throw new InvalidTimeSlotEndException('The time slot format must respect the HH:MM pattern.');
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
