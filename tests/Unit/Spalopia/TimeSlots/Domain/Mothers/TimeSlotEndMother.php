<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers;

use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;
use Spalopia\TimeSlots\Domain\TimeSlotEnd;

final class TimeSlotEndMother
{
    public static function create(?string $value = null): TimeSlotEnd
    {
        $end = $value ?? MotherCreator::random()->dateTimeBetween('12:00', '13:00')->format('H:i');

        return new TimeSlotEnd($value ?? $end);
    }
}
