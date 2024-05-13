<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers;

use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;
use Spalopia\TimeSlots\Domain\TimeSlotStart;

final class TimeSlotStartMother
{
    public static function create(?string $value = null): TimeSlotStart
    {
        $start = $value ?? MotherCreator::random()->dateTimeBetween('09:00', '11:00')->format('H:i');

        return new TimeSlotStart($value ?? $start);
    }
}
