<?php

namespace Spalopia\TimeSlots\Domain;

final readonly class TimeSlotAvailable
{
    public function __construct(private bool $value) {}

    public function value(): bool
    {
        return $this->value;
    }
}
