<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers;

use Spalopia\TimeSlots\Domain\TimeSlot;
use Spalopia\TimeSlots\Domain\TimeSlotAvailable;
use Spalopia\TimeSlots\Domain\TimeSlotDay;
use Spalopia\TimeSlots\Domain\TimeSlotEnd;
use Spalopia\TimeSlots\Domain\TimeSlotId;
use Spalopia\TimeSlots\Domain\TimeSlotSpaServiceId;
use Spalopia\TimeSlots\Domain\TimeSlotStart;

final class TimeSlotMother
{
    public static function create(
        ?TimeSlotId $id = null,
        ?TimeSlotSpaServiceId $serviceId = null,
        ?TimeSlotDay $day = null,
        ?TimeSlotStart $start = null,
        ?TimeSlotEnd $end = null,
        ?TimeSlotAvailable $available = null,
    ): TimeSlot {
        return TimeSlot::create(
            $id ?? TimeSlotIdMother::create(),
            $serviceId ?? TimeSlotSpaServiceIdMother::create(),
            $day ?? TimeSlotDayMother::create(),
            $start ?? TimeSlotStartMother::create(),
            $end ?? TimeSlotEndMother::create(),
            $available ?? TimeSlotAvailableMother::create(),
        );
    }
}
