<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers\TimeSlotDayMother;
use Spalopia\TimeSlots\Domain\InvalidTimeSlotDayException;

final class TimeSlotDayTest extends TestCase
{
    public function testShouldThrowExceptionOnIncorrectTimeSlotDay(): void
    {
        $this->expectException(InvalidTimeSlotDayException::class);

        TimeSlotDayMother::create(new DateTimeImmutable('-1 day'));
    }
}
