<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers;

use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;
use Spalopia\TimeSlots\Domain\TimeSlotSpaServiceId;

final class TimeSlotSpaServiceIdMother
{
    public static function create(?string $value = null): TimeSlotSpaServiceId
    {
        return new TimeSlotSpaServiceId($value ?? MotherCreator::random()->uuid());
    }
}
