<?php

namespace Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain;

use PHPUnit\Framework\TestCase;
use Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers\TimeSlotStartMother;
use Spalopia\TimeSlots\Domain\InvalidTimeSlotStartException;

final class TimeSlotStartTest extends TestCase
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
    public function testShouldThrowExceptionOnIncorrectTimeSlotStart($data): void
    {
        $this->expectException(InvalidTimeSlotStartException::class);
        TimeSlotStartMother::create($data);
    }
}
