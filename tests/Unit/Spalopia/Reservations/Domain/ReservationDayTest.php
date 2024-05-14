<?php

namespace Spalopia\Tests\Unit\Spalopia\Reservations\Domain;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Spalopia\Reservations\Domain\InvalidReservationDayException;
use Spalopia\Tests\Unit\Spalopia\Reservations\Domain\Mothers\ReservationDayMother;

final class ReservationDayTest extends TestCase
{
    public function testShouldThrowExceptionOnIncorrectReservationDay(): void
    {
        $this->expectException(InvalidReservationDayException::class);

        ReservationDayMother::create(new DateTimeImmutable('-1 day'));
    }
}
