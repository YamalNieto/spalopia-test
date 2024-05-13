<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers;

use DateTimeImmutable;
use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;
use Spalopia\TimeSlots\Domain\TimeSlotDay;

final class TimeSlotDayMother
{
    public static function create(?DateTimeImmutable $value = null): TimeSlotDay
    {
        return new TimeSlotDay($value ?? DateTimeImmutable::createFromMutable(MotherCreator::random()->dateTimeBetween('+1 day', '+2 days')));
    }
}
