<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain;

use PHPUnit\Framework\TestCase;
use Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers\TimeSlotEndMother;
use Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers\TimeSlotMother;
use Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers\TimeSlotStartMother;
use Spalopia\TimeSlots\Domain\InvalidTimeSlotRangeException;
use Spalopia\TimeSlots\Domain\TimeSlot;

final class TimeSlotTest extends TestCase
{
    public function testShouldCreateTimeSlotOnCorrectData(): void
    {
        $timeSlot = TimeSlotMother::create();

        $this->assertEquals($timeSlot, TimeSlot::create($timeSlot->id(), $timeSlot->serviceId(), $timeSlot->day(), $timeSlot->start(), $timeSlot->end(), $timeSlot->isAvailable()));
    }

    public function test(): void
    {
        $this->expectException(InvalidTimeSlotRangeException::class);
        TimeSlotMother::create(
            start: TimeSlotStartMother::create('10:00'),
            end: TimeSlotEndMother::create('08:00'),
        );
    }

}
