<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain;

use PHPUnit\Framework\TestCase;
use Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers\TimeSlotEndMother;
use Spalopia\TimeSlots\Domain\InvalidTimeSlotEndException;

final class TimeSlotEndTest extends TestCase
{
    public function wrongTimeProvider(): array
    {
        return [
            ['9-00'],
            ['24:00'],
            ['10:00 pm'],
            ['10:80'],
        ];
    }

    /**
     * @dataProvider wrongTimeProvider
     */
    public function testShouldThrowExceptionOnIncorrectTimeSlotEnd($data): void
    {
        $this->expectException(InvalidTimeSlotEndException::class);
        TimeSlotEndMother::create($data);
    }
}
