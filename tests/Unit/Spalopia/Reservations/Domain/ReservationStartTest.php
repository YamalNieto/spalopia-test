<?php

namespace Spalopia\Tests\Unit\Spalopia\Reservations\Domain;

use PHPUnit\Framework\TestCase;
use Spalopia\Reservations\Domain\InvalidReservationStartException;
use Spalopia\Tests\Unit\Spalopia\Reservations\Domain\Mothers\ReservationStartMother;

final class ReservationStartTest extends TestCase
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
    public function testShouldThrowExceptionOnIncorrectReservationStart($start): void
    {
        $this->expectException(InvalidReservationStartException::class);
        ReservationStartMother::create($start);
    }
}
