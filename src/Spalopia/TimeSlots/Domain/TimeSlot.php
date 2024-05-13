<?php

namespace Spalopia\TimeSlots\Domain;

use DateTimeImmutable;

final readonly class TimeSlot
{
    private function __construct(
        private TimeSlotId $id,
        private TimeSlotSpaServiceId $serviceId,
        private TimeSlotDay $day,
        private TimeSlotStart $startTime,
        private TimeSlotEnd $endTime,
        private TimeSlotAvailable $available
    ) {}

    public static function create(
        ?TimeSlotId $id,
        TimeSlotSpaServiceId $serviceId,
        TimeSlotDay $day,
        TimeSlotStart $startTime,
        TimeSlotEnd $endTime,
        TimeSlotAvailable $available
    ): self
    {
        if (!self::checkTimeRange($startTime, $endTime))
        {
            throw new InvalidTimeSlotRangeException('The start must be before the end');
        }

        return new self($id ?? TimeSlotId::random(), $serviceId, $day, $startTime, $endTime, $available);
    }

    public function id(): TimeSlotId
    {
        return $this->id;
    }

    public function serviceId(): TimeSlotSpaServiceId
    {
        return $this->serviceId;
    }

    public function day(): TimeSlotDay
    {
        return $this->day;
    }

    public function start(): TimeSlotStart
    {
        return $this->startTime;
    }

    public function end(): TimeSlotEnd
    {
        return $this->endTime;
    }

    public function isAvailable(): TimeSlotAvailable
    {
        return $this->available;
    }

    private static function checkTimeRange(TimeSlotStart $start, TimeSlotEnd $end): bool
    {
        return
            DateTimeImmutable::createFromFormat('H:i', $start->value()) <
            DateTimeImmutable::createFromFormat('H:i', $end->value());
    }
}
