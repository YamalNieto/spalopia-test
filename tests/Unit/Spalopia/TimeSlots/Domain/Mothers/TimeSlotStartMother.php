<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers;

use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;
use Spalopia\TimeSlots\Domain\TimeSlotStart;

final class TimeSlotStartMother
{
    public static function create(?string $value = null): TimeSlotStart
    {
        return new TimeSlotStart($value ?? MotherCreator::random()->time('H:i'));
    }
}
