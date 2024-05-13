<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers;

use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;
use Spalopia\TimeSlots\Domain\TimeSlotId;

final class TimeSlotIdMother
{
    public static function create(?string $value = null): TimeSlotId
    {
        return new TimeSlotId($value ?? MotherCreator::random()->uuid());
    }
}
