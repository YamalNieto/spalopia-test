<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers;

use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;
use Spalopia\TimeSlots\Domain\TimeSlotEnd;

final class TimeSlotEndMother
{
    public static function create(?string $value = null): TimeSlotEnd
    {
        return new TimeSlotEnd($value ?? MotherCreator::random()->time('H:i', '+1 hour'));
    }
}
