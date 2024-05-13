<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers;

use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;
use Spalopia\TimeSlots\Domain\TimeSlotAvailable;

final class TimeSlotAvailableMother
{
    public static function create(?bool $value = null): TimeSlotAvailable
    {
        return new TimeSlotAvailable($value ?? MotherCreator::random()->boolean());
    }
}
